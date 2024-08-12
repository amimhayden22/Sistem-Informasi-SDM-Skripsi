<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\{Employee, Transaction};
use Illuminate\Support\Facades\{Auth, DB, Hash, Mail, Http};
use App\Mail\{NotificationRequestLeave, UnapprovedLeave, ApprovedLeave};

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $checkRole = 'admin';

        if($checkRole === 'karyawan'){
            $transactions = Transaction::with(['employee', 'employee.part', 'employee.position'])
                            ->where('employee_id', Auth::user()->employee->id)
                            ->orderBy('created_at', 'desc')
                            ->get();
        }elseif($checkRole === 'manajer'){
            $checkPosition = Auth::user()->employee->position->name;
            switch ($checkPosition) {
                case 'Marketing and Partnerships Manager':
                    $positionName = 'Marketing and Partnerships Manager';
                    $partName = 'Marketing and Partnerships';
                    break;
                case 'Product Development Manager':
                    $positionName = 'Product Development Manager';
                    $partName = 'Product Development';
                    break;
                case 'Finance Accounting Tax Manager':
                    $positionName = 'Finance Accounting Tax Manager';
                    $partName = 'Finance Accounting Tax';
                    break;
                default:
                    # code...
                    break;
            }
            $transactions = Transaction::with(['employee', 'employee.part', 'employee.position'])
                                ->whereHas('employee.part', function ($query) use($partName){
                                    $query->where('parts.name', $partName);
                                })
                                ->whereIn('status', ['Mengajukan', 'Sedang Proses', 'Disetujui', 'Tidak Disetujui'])
                                ->orderBy('created_at', 'desc')
                                ->get();
        }elseif($checkRole === 'user'){
            return abort(404);
        }else{
            $transactions = Transaction::with(['employee', 'employee.part', 'employee.position'])
                                        ->orderBy('created_at', 'desc')
                                        ->get();
        }

        return view('transaction.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees = Employee::all();

        return view('transaction.create', compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'leave_date'          => 'required|date',
            'return_date'         => 'required|date',
            'description'         => 'required|string',
            'for'                 => 'required|string',
            'sub_permission'      => 'string',
            'applicant_signature' => 'required',
            'attachment'          => 'mimes:png,jpg,pdf|max:2048',
        ],[
            'attachment.max'      => 'The attachment must not be greater than 2 megabyte (2MB).',
            'for.required'        => 'The work permit requirements field is required.'
        ]);

        $id = Auth::user()->employee->id;
        $uuid = Str::uuid()->toString();

        $folderPath = public_path('images/signature/');
        $imageParts = explode(";base64,", $request->applicant_signature);
        $imageTypeAux = explode("image/", $imageParts[0]);
        $imageType = $imageTypeAux[1];
        $imageBase64 = base64_decode($imageParts[1]);
        $signature = 'a4f212c8-'.$uuid.'.'. $imageType;
        $file = $folderPath . $signature;
        file_put_contents($file, $imageBase64);

        $start_date = Carbon::parse($request->leave_date);
        $end_date = Carbon::parse($request->return_date);

        $holidays = ['2019-05-01'];

        $totalDay = -1;

        for ($i = 0; $i <= $end_date->diffInDays($start_date); $i++) {
            $temp_date = $start_date->copy()->addDays($i);
            if ($temp_date->isWeekday() && !in_array($temp_date->format('Y-m-d'), $holidays)) {
                $totalDay++;
            }
        }

        DB::beginTransaction();

        try {

            if($request->has('attachment')){
                $attachment = $request->attachment;
                $ext = $attachment->extension();
                $newAttachment = '45a8c389-'.$uuid.'.'.$ext;
                $attachment->move('images/attachment', $newAttachment);

                $createTransaction = Transaction::create([
                    'employee_id'         => $id,
                    'leave_date'          => $request->leave_date,
                    'return_date'         => $request->return_date,
                    'description'         => $request->description,
                    'for'                 => $request->for,
                    'sub_permission'      => $request->sub_permission,
                    'status'              => $request->status,
                    'applicant_signature' => $signature,
                    'attachment'          => $newAttachment,
                    'total_day'           => $totalDay

                ]);
            }else{
                $createTransaction = Transaction::create([
                    'employee_id'         => $id,
                    'leave_date'          => $request->leave_date,
                    'return_date'         => $request->return_date,
                    'description'         => $request->description,
                    'for'                 => $request->for,
                    'sub_permission'      => $request->sub_permission,
                    'status'              => $request->status,
                    'applicant_signature' => $signature,
                    'total_day'           => $totalDay

                ]);
            }

            $checkAdmin = Employee::whereHas('position', function($query){
                $query->where('positions.name', 'Office Administrator');
            })->first();

            if(is_null($checkAdmin)){
                return abort(404);
            }

            $email = $checkAdmin->email;
            $for = 'Office Administrator';

            Mail::to($email)->send(new NotificationRequestLeave($createTransaction, $for));

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withInput($request->all())->with('error', $e->getMessage());
        }

        return redirect('/dashboard/work-permit')->with('success', 'Pengajuan Izin Kerja telah berhasil diajukan. Silahkan tunggu proses selanjutnya.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaction = Transaction::with('employee')->find($id);
        // return($transaction);
        return view('transaction.preview', compact('transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::all();
        $transaction = Transaction::with('employee')->find($id);
        if (is_null($transaction)) {
            return abort(404);
        }
        if ($transaction->status != 'Mengajukan') {
            return abort(403, 'Data sudah tidak bisa di edit!');
        }

        return view('transaction.edit', compact('transaction','employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
        ]);

        $updateTransaction = Transaction::find($id);
        try {
            DB::beginTransaction();

            $updateTransaction->update([
                'reason'              => $request->reason,
                'status'              => $request->status,
            ]);

            if ($updateTransaction->status === 'Sedang Proses') {

                if ($updateTransaction->employee->part->name === 'Web Developer' || $updateTransaction->employee->part->name === 'General Affair'){
                    $checkDirector = Employee::whereHas('position', function($query){
                        $query->where('positions.name', 'Chief Executive Officer');
                    })->first();

                    if(is_null($checkDirector)){
                        return abort(404);
                    }

                    $for ='Direktur';

                    $email = $checkDirector->email;
                }

                if ($updateTransaction->employee->part->name === 'Product Development'){
                    $checkManagerProDev = Employee::where('status', 'Active')->whereHas('position', function($query){
                        $query->where('positions.name', 'Product Development Manager');
                    })->first();

                    if(is_null($checkManagerProDev)){
                        // return abort(404);
                        $checkManagerProDev = Employee::whereHas('position', function($query){
                            $query->where('positions.name', 'Chief Executive Officer');
                        })->first();
                    }

                    $for = 'Product Development Manager';

                    $email = $checkManagerProDev->email;
                }

                if ($updateTransaction->employee->part->name === 'Marketing and Partnerships'){
                    $checkManagerMarPar = Employee::whereHas('position', function($query){
                        $query->where('positions.name', 'Marketing and Partnerships Manager');
                    })->first();

                    if(is_null($checkManagerMarPar)){
                        return abort(404);
                    }

                    $for = 'Marketing and Partnerships Manager';

                    $email = $checkManagerMarPar->email;
                }

                Mail::to($email)->send(new NotificationRequestLeave($updateTransaction, $for));


            }
            if ($updateTransaction->status === 'Tidak Disetujui'){
                $checkStaff = Employee::where('email', $updateTransaction->employee->email)->first('email');

                if(is_null($checkStaff)){
                    return abort(404);
                }

                Mail::to($checkStaff)->send(new UnapprovedLeave($updateTransaction));
            }
            if ($updateTransaction->status === 'Disetujui'){
                $checkStaff = Employee::where('email', $updateTransaction->employee->email)->first('email');

                if(is_null($checkStaff)){
                    return abort(404);
                }

                Mail::to($checkStaff)->send(new ApprovedLeave($updateTransaction));

            }

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->back()->with('error', $th->getMessage())->withInput($request->all());
        }

        return redirect('/dashboard/work-permit')->with('process', 'Pengajuan Izin Kerja telah berhasil diproses.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteTransactions = Transaction::find($id);
        $deleteTransactions->delete();

        return redirect()->back()->with(['delete' => 'Data berhasil dihapus']);

    }

    public function print($id)
    {
        $transaction = Transaction::with('employee')->find($id);

        $directorName = Employee::whereHas('position', function($query){
                    $query->where('positions.name', 'Chief Executive Officer');
                })->first();

        $BaGaName = Employee::whereHas('position', function($query){
                    $query->where('positions.name', 'Business Admin and General Affair');
                })->first();

        $ManagerProDevName = Employee::whereHas('position', function($query){
                    $query->where('positions.name', 'Product Development Manager');
                })->first();

        $ManagerMarParName = Employee::whereHas('position', function($query){
                    $query->where('positions.name', 'Marketing and Partnerships Manager');
                })->first();

        return view('transaction.print', compact('transaction', 'directorName', 'BaGaName', 'ManagerProDevName', 'ManagerMarParName'));
    }
}
