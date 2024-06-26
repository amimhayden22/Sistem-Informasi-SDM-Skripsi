<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Position;
use App\Models\Part;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $positions = Position::all();
        return view('position.index', compact('positions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parts     = Part::all();
        return view('position.create', compact('parts'));
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
            'name'    => 'required|string',
            'part_id' => 'required|integer',
        ]);

        $position = Position::create([
            'name'    => $request->name,
            'part_id' => $request->part_id,
        ]);

        return redirect('/dashboard/positions')->with('message', 'Data berhasil dibuat!');
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
        $parts    = Part::all();
        $position = Position::with(['part'])->find($id);
        if (is_null($position)) {
            return abort(404);
        }
        return view('position.edit', compact('position','parts'));
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
            'name'    => 'required|string',
            'part_id' => 'required|integer',
        ]);

        $updatePosition = Position::find($id);
        $updatePosition->update([
            'name'    => $request->name,
            'part_id' => $request->part_id,
        ]);

        return redirect('/dashboard/positions')->with('message', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $position = Position::find($id);
        if (is_null($position)) {
            return abort(404);
        }
        $position->delete();
        return back()->with('message', 'Data berhasil dihapus!');
    }
}
