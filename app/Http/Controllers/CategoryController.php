<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

use function PHPUnit\Framework\fileExists;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function updateCategoryStatus(Category $category)
    {

        $category->status =
            $category->status === 0 ? $category->status = 1 : $category->status = 0;
        $category->save();

        return redirect(route('category.index'))->with('message', 'Updated data');
    }

    public function index()
    {
        $categories = Category::all();
        // dd(1);
        return view('pages.category.manageCategory', compact('categories'));
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
        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->status = $request->status;

        if ($request->file('image')) {
            $imageName = $request->file('image')->getClientOriginalName();
            $request->image->move(public_path('category-images/'), $imageName);
            $category->image = 'category-images/' . $imageName;
        } else {
            $category->image = 'dummy.png';
        }


        $category->save();
        $request->session()->flash('message', 'Category created');
        return redirect()->route('category.index');
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
    public function edit(Category $category)
    {
        //
        return view('pages.category.categoryEdit', compact('category'));
        // dd($category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
        // dd($category);
        if ($request->file('image')) {
            if (fileExists($category->image)) {
                unlink($category->image);
                $imageName = $request->file('image')->getClientOriginalName();
                $request->image->move(public_path('category-images/'), $imageName);
                $category->image = 'category-images/' . $imageName;
            }
        } else {

            $category->image = $category->image;
        }
        $category->name = $request->name;
        $category->description = $request->description;
        $category->status = $request->status;
        $category->save();
        $request->session()->flash(
            'message',
            'Category updated'
        );
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category,Request $request)
    {
        //
        if (fileExists($category->image)) {
           if ($category->image !== 'dummy.png') {
                unlink($category->image);
           }
           else{

           }
            $category->delete();
            $request->session()->flash(
                'message',
                'Category deleted'
            );
            return redirect()->route('category.index');
        }
        // dd($category);
    }
}
