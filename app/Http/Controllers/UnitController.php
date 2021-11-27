<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateUnitStatus(Unit $unit)
    {
        $unit->status =
            $unit->status === 0 ? $unit->status = 1 : $unit->status = 0;
        $unit->save();

        return redirect(route('unit.index'))->with('message', 'Updated data');
    }

    public function index()
    {
        $units = Unit::all();
        // dd(1);
        return view('pages.unit.manageUnit', compact('units'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $unit = new Unit();
        $unit->name = $request->name;
        $unit->code = $request->code;
        $unit->description = $request->description;
        $unit->status = $request->status;


        $unit->save();
        $request->session()->flash('message', 'unit created');
        return redirect()->route('unit.index');
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
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Unit $unit)
    {
        //
        return view('pages.unit.unitEdit', compact('unit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unit $unit)
    {

        $unit->name = $request->name;
        $unit->code = $request->code;
        $unit->description = $request->description;
        $unit->status = $request->status;
        $unit->save();
        $request->session()->flash(
            'message',
            'unit updated'
        );
        return redirect()->route('unit.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unit $unit, Request $request)
    {

        $unit->delete();
        $request->session()->flash(
            'message',
            'unit deleted'
        );
        return redirect()->route('unit.index');
    }
}
