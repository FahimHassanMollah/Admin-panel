<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

use function PHPUnit\Framework\fileExists;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateBrandStatus(Brand $brand)
    {
        $brand->status =
        $brand->status === 0 ? $brand->status = 1 : $brand->status = 0;
        $brand->save();

        return redirect(route('brand.index'))->with('message', 'Updated data');
    }

    public function index()
    {
        $brands = Brand::all();
        // dd(1);
        return view('pages.brand.manageBrand', compact('brands'));
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
        $brand = new Brand();
        $brand->name = $request->name;
        $brand->description = $request->description;
        $brand->status = $request->status;

        if ($request->file('image')) {
            $imageName = $request->file('image')->getClientOriginalName();
            $request->image->move(public_path('brand-images/'), $imageName);
            $brand->image = 'brand-images/' . $imageName;
        } else {
            $brand->image = 'dummy.png';
        }


        $brand->save();
        $request->session()->flash('message', 'Brand created');
        return redirect()->route('brand.index');
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
    public function edit(Brand $brand)
    {
        //
        return view('pages.brand.brandEdit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        if ($request->file('image')) {
            if (fileExists($brand->image)) {
                unlink($brand->image);
                $imageName = $request->file('image')->getClientOriginalName();
                $request->image->move(public_path('brand-images/'), $imageName);
                $brand->image = 'brand-images/' . $imageName;
            }
        } else {

            $brand->image = $brand->image;
        }
        $brand->name = $request->name;
        $brand->description = $request->description;
        $brand->status = $request->status;
        $brand->save();
        $request->session()->flash(
            'message',
            'Brand updated'
        );
        return redirect()->route('brand.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand, Request $request)
    {
        if (fileExists($brand->image)) {
            if ($brand->image !== 'dummy.png') {
                unlink($brand->image);
            } else {
            }
            $brand->delete();
            $request->session()->flash(
                'message',
                'Brand deleted'
            );
            return redirect()->route('brand.index');
        }
    }
}
