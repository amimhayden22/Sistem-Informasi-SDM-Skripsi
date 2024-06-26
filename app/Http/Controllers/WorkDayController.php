<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\WorkDay;
use Illuminate\Http\Request;

class WorkDayController extends Controller
{
    function countWorkingDays($start_date, $end_date)
    {
        $holidays = [
            "2023-03-22", "2023-03-23"
        ];
        $working_days = 0;

        for ($i = 0; $i <= $end_date->diffInDays($start_date); $i++) {
            $temp_date = $start_date->copy()->addDays($i);
            if ($temp_date->isWeekday() && !in_array($temp_date->format('Y-m-d'), $holidays)) {
                $working_days++;
            }
        }
        return $working_days;
    }

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        // // $workDays = WorkDay::all();

        // $date = Carbon::createFromFormat('Y-m-d', '2022-01-01');
        // $prev_month = $date->subMonths(1);

        // echo "Tanggal 1 bulan sebelumnya dari tanggal input: " . $prev_month->format('Y-m-d');

        // return view('work-days.index', compact('workDays'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('work-days.create');
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
            'month'         => 'required',
            'year'          => 'required',
            'start_date'    => 'required|date',
            'end_date'      => 'required|date'
        ]);

        // untuk kolom date
        $date = $request->year.$request->month.'01';

        // Menghitung total hari kerja dari range inputan tanggal si user
        $start_date = Carbon::createFromFormat('Y-m-d', $request->start_date);
        $end_date = Carbon::createFromFormat('Y-m-d', $request->end_date);

        // hitung selisih hari dari tanggal awal dan akhir
        $date_interval = $start_date->diff($end_date);

        // hitung jumlah hari total
        $total_days = $date_interval->d;

        // hitung jumlah hari akhir pekan
        $weekend_days = 0;
        for($i = 0; $i <= $total_days; $i++) {
            $temp_date = $start_date->copy()->addDays($i);
            if($temp_date->isSaturday() || $temp_date->isSunday()) {
                $weekend_days++;
            }
        }


        // hitung jumlah hari kerja
        $working_days = $total_days - $weekend_days;

        $createWorkDay = WorkDay::create([
            'date'  => $date,
            'total' => $working_days
        ]);

        return redirect('dashboard/work-days')->with('success', 'Tambah data berhasil....');
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        //
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        $editWorkDay = WorkDay::find($id);
        if (is_null($editWorkDay)) {
            return abort(404);
        }

        return view('work-days.edit', compact('editWorkDay'));
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
            'month'         => 'required',
            'year'          => 'required',
            'total'         => 'required',
        ]);
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        $deleteWorkDay = WorkDay::find($id);
        if (is_null($deleteWorkDay)) {
            return abort(404);
        }
        $deleteWorkDay->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus...');
    }
}
