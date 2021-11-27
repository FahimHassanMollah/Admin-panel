<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateColorStatus(Color $color)
    {
        $color->status =
            $color->status === 0 ? $color->status = 1 : $color->status = 0;
        $color->save();

        return redirect(route('color.index'))->with('message', 'Updated data');
    }

    public function index()
    {
        $colors = Color::all();
        // dd(1);
        return view('pages.color.manageColor', compact('colors'));
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
        $color = new Color();
        $color->name = $request->name;
        $color->code = $request->code;
        $color->description = $request->description;
        $color->status = $request->status;


        $color->save();
        $request->session()->flash('message', 'color created');
        return redirect()->route('color.index');
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
    public function edit(Color $color)
    {
        //
        return view('pages.color.colorEdit', compact('color'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Color $color)
    {

        $color->name = $request->name;
        $color->code = $request->code;
        $color->description = $request->description;
        $color->status = $request->status;
        $color->save();
        $request->session()->flash(
            'message',
            'color updated'
        );
        return redirect()->route('color.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Color $color, Request $request)
    {

            $color->delete();
            $request->session()->flash(
                'message',
                'color deleted'
            );
            return redirect()->route('color.index');

    }
}
