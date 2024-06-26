<?php

namespace App\Http\Controllers\Api;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmployeeApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::with('position')
                    ->select('id', 'name', 'email', 'phone', 'position_id', 'signature_file')
                    ->where([
                        ['status', 'Active'],
                        ['part_id', 3]
                    ])
                    ->get();

        return response()->json(['employees' => $employees])->header('Access-Control-Allow-Origin', '*');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $showEmployee = Employee::with('position')
                        ->select('id', 'name', 'email', 'phone', 'position_id', 'signature_file')
                        ->where([
                            ['status', 'Active'],
                            ['part_id', 3]
                        ])
                        ->find($id);
        if (is_null($showEmployee)) {
            return response()->json(['message' => 'Data not found'], 404);
        }

        return response()->json(['showEmployee' => $showEmployee])->header('Access-Control-Allow-Origin', '*');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
