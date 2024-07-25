<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Holiday;
use App\Models\Attendance;
use App\Models\Transaction;
use Illuminate\Support\Str;
use App\Models\BusinessTrip;
use Illuminate\Http\Request;
use App\Models\WfhTransaction;
use Illuminate\Validation\Rule;
use App\Mail\AccountInformation;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Models\{Employee, Part, Position, User};
use Illuminate\Support\Facades\{Auth, DB, Hash};

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::orderBy('status')->get();

        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parts     = Part::all();
        $positions = Position::all();
        $employee = DB::table('employees')->select(DB::raw('MAX(RIGHT(code,3)) as code'));
        $generateNumber="";
        if ($employee->count()>0) {
            foreach ($employee->get() as $k) {
                $tmp = ((int)$k->code)+1;
                $generateNumber = sprintf("%03s", $tmp);
            }
        } else {
            $generateNumber = "001"; // kode awal default
        }

        return view('employees.create', compact('parts', 'positions', 'generateNumber'));
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
            'code'              => 'required|string|unique:employees,code',
            'name'              => 'required|string',
            'place_of_birth'    => 'required|string',
            'date_of_birth'     => 'required|date',
            'id_card_number'    => 'required|numeric',
            'tax_number'        => 'required|numeric',
            'email'             => 'required|email|unique:employees,email',
            'address'           => 'required|string',
            'phone'             => 'required|numeric',
            'religion'          => 'required|not_in:0',
            'education'         => 'required|not_in:0',
            'bank'              => 'required|string',
            'account_number'    => 'required|numeric',
            'position_id'       => 'required|integer',
            'part_id'           => 'required|integer',
            'start_contract'    => 'required|date',
            'end_of_contract'   => 'required|date',
            'basic_salary'      => 'required|numeric',
            'marital_status'    => 'required',
            'dependents_count'  => 'required|numeric',
            'signature_file'    => 'nullable|image|mimes:png,jpg,jpeg,webp|max:2048',
            'id_card_file'      => 'nullable|mimes:png,jpg,jpeg,pdf|max:2048',
            'status'            => 'required|string|in:Active,Inactive'
        ],[
            'account_number.digits_between' => 'Account number must be 10-16 digits long!'
        ]);

        // Inisialisasi data yang akan disimpan
        $employeeData = [
            'code'              => $request->code,
            'name'              => $request->name,
            'place_of_birth'    => $request->place_of_birth,
            'date_of_birth'     => $request->date_of_birth,
            'id_card_number'    => $request->id_card_number,
            'tax_number'        => $request->tax_number,
            'email'             => $request->email,
            'address'           => $request->address,
            'phone'             => $request->phone,
            'religion'          => $request->religion,
            'education'         => $request->education,
            'bank'              => $request->bank,
            'account_number'    => $request->account_number,
            'position_id'       => $request->position_id,
            'part_id'           => $request->part_id,
            'start_contract'    => $request->start_contract,
            'end_of_contract'   => $request->end_of_contract,
            'basic_salary'      => $request->basic_salary,
            'marital_status'    => $request->marital_status,
            'dependents_count'  => $request->dependents_count,
            'status'            => $request->status,
        ];

        // Cek apakah ada file signature yang diunggah
        if ($request->has('signature_file')) {
            $file = $request->file('signature_file');
            $newFile = Str::uuid().'.'.$file->getClientOriginalExtension();
            $file->move('backend/assets/img/employees/signature/', $newFile);
            $employeeData['signature_file'] = $newFile;
        }

        // Cek apakah ada file ktp yang diunggah
        if ($request->has('id_card_file')) {
            $file = $request->file('id_card_file');
            $newIdCard = Str::uuid().'.'.$file->getClientOriginalExtension();
            $file->move('backend/assets/img/employees/id_card/', $newIdCard);
            $employeeData['id_card_file'] = $newIdCard;
        }

        // Membuat objek Employee dengan data yang sudah diinisialisasi
        $createEmployee = Employee::create($employeeData);

        // Membuat objek User dengan data yang sudah diinisialisasi
        $userData = [
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->id_card_number),
            'role'      => 'karyawan',
        ];

        $createUser = User::create($userData);

        return redirect('/dashboard/employees')->with('success', 'Tambah data berhasil!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::find($id);
        if(is_null($employee)){
            return response()->json(['message' => 'Data not found'], 404);
        }

        return response()->json($employee, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $positions = Position::all();
        $parts = Part::all();
        $employee = Employee::with(['position','part'])->find($id);
        if(is_null($employee)){
            return abort(404);
        }

        return view('employees.edit', compact('employee','positions','parts'));
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
            'code'              => 'required',
            'name'              => 'required|string',
            'place_of_birth'    => 'required|string',
            'date_of_birth'     => 'required|date',
            'id_card_number'    => 'required|numeric',
            'email'             => 'required|email',
            'address'           => 'required|string',
            'phone'             => 'required|numeric',
            'religion'          => 'required|not_in:0',
            'education'         => 'required|not_in:0',
            'bank'              => 'required|string',
            'account_number'    => 'required|numeric',
            'position_id'       => 'required|integer',
            'part_id'           => 'required|integer',
            'start_contract'    => 'required|date',
            'end_of_contract'   => 'required|date',
            'basic_salary'      => 'required|numeric',
            'status'            => 'required|string'
        ]);

        // Inisialisasi data yang akan disimpan
        $employeeData = [
            'code'              => $request->code,
            'name'              => $request->name,
            'place_of_birth'    => $request->place_of_birth,
            'date_of_birth'     => $request->date_of_birth,
            'id_card_number'    => $request->id_card_number,
            'tax_number'        => $request->tax_number,
            'email'             => $request->email,
            'address'           => $request->address,
            'phone'             => $request->phone,
            'religion'          => $request->religion,
            'education'         => $request->education,
            'bank'              => $request->bank,
            'account_number'    => $request->account_number,
            'position_id'       => $request->position_id,
            'part_id'           => $request->part_id,
            'start_contract'    => $request->start_contract,
            'end_of_contract'   => $request->end_of_contract,
            'basic_salary'      => $request->basic_salary,
            'marital_status'    => $request->marital_status,
            'dependents_count'  => $request->dependents_count,
            'status'            => $request->status,
        ];

        // Cek apakah ada file signature yang diunggah
        if ($request->has('signature_file')) {
            $file = $request->file('signature_file');
            $newSignature = Str::uuid().'.'.$file->getClientOriginalExtension();
            $file->move('backend/assets/img/employees/signature/', $newSignature);
            $employeeData['signature_file'] = $newSignature;
        }

        // Cek apakah ada file ktp yang diunggah
        if ($request->has('id_card_file')) {
            $file = $request->file('id_card_file');
            $newIdCard = Str::uuid().'.'.$file->getClientOriginalExtension();
            $file->move('backend/assets/img/employees/id_card/', $newIdCard);
            $employeeData['id_card_file'] = $newIdCard;
        }

        // Mencari dan memperbarui objek Employee berdasarkan ID
        $updateEmployee = Employee::find($id);
        $updateEmployee->update($employeeData);

        return redirect()->back()->with('success', 'Biodata '.$updateEmployee->name.' berhasil diperbarui...');
    }

    /**
      * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteEmployee = Employee::find($id);
        $deleteEmployee->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus!');
    }
}
