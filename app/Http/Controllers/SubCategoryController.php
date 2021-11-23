<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

use function PHPUnit\Framework\fileExists;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateSubCategoryStatus(SubCategory $subcategory)
    {
        $subcategory->status = $subcategory->status === 0 ? $subcategory->status = 1 : $subcategory->status = 0;
        $subcategory->save();

        return redirect(route('sub-category.index'))->with('message', 'Updated  status');
    }

    public function index()
    {
        //
        $sub_categories = SubCategory::with('category')->get();
        $categories = Category::where('status', 1)->get();
        return view('pages.subCategory.manageSubCategory', compact('sub_categories', 'categories'));
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
        //
        $sub_category = new SubCategory();
        $sub_category->category_id = $request->category_id;
        $sub_category->name = $request->name;
        $sub_category->description = $request->description;
        $sub_category->status = $request->status;

        if ($request->file('image')) {
            $image_name = $request->file('image')->getClientOriginalName();
            $request->image->move(public_path('sub-cate-images'), $image_name);
            $sub_category->image = 'sub-cate-images/' . $image_name;
        } else {
            $sub_category->image = 'dummy.png';
        }
        $sub_category->save();
        return redirect()->route('sub-category.index')->with('message', "Sub category created successfully");
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
    public function edit(SubCategory $sub_category)
    {
        $categories = Category::all();
        return view('pages.subCategory.subCategoryEdit', compact('sub_category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SubCategory $sub_category, Request $request)
    {
        // dd($request->all());
        if ($request->file('image')) {
            if (fileExists($sub_category->image)) {
                unlink($sub_category->image);
                $image_name = $request->file('image')->getClientOriginalName();
                $request->image->move(public_path('sub-cate-images'), $image_name);
                $sub_category->image = 'sub-cate-images/' . $image_name;
            }
        } else {
            $sub_category->image = $sub_category->image;
        }

        $sub_category->category_id = $request->category_id;
        $sub_category->name = $request->name;
        $sub_category->description = $request->description;
        $sub_category->status = $request->status;
        $sub_category->save();
        return redirect()->route('sub-category.index')->with('message', "Sub category updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategory $sub_category)
    {

        if ($sub_category->image != 'dummy.png') {

            if (fileExists($sub_category->image)) {
                unlink($sub_category->image);
            }
        }
        $sub_category->delete();
        return redirect()->route('sub-category.index')->with('message', "Sub category deleted successfully");
    }
}
