<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateSizeStatus(Size $size)
    {
        $size->status =
            $size->status === 0 ? $size->status = 1 : $size->status = 0;
        $size->save();

        return redirect(route('size.index'))->with('message', 'Updated data');
    }

    public function index()
    {
        $sizes = Size::all();
        // dd(1);
        return view('pages.size.manageSize', compact('sizes'));
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
        $size = new Size();
        $size->name = $request->name;
        $size->code = $request->code;
        $size->description = $request->description;
        $size->status = $request->status;


        $size->save();
        $request->session()->flash('message', 'size created');
        return redirect()->route('size.index');
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
    public function edit(Size $size)
    {
        //
        return view('pages.size.sizeEdit', compact('size'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Size $size)
    {

        $size->name = $request->name;
        $size->code = $request->code;
        $size->description = $request->description;
        $size->status = $request->status;
        $size->save();
        $request->session()->flash(
            'message',
            'size updated'
        );
        return redirect()->route('size.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Size $size, Request $request)
    {

        $size->delete();
        $request->session()->flash(
            'message',
            'size deleted'
        );
        return redirect()->route('size.index');
    }
}
