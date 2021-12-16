<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\OtherImage;
use App\Models\OtherImagee;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductSize;
use App\Models\Size;
use App\Models\SubCategory;
use App\Models\Unit;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\fileExists;

// use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //

    public function getSubCategories($id)
    {
        // dd(Category::find($id)->with('subCategories')->get());
        $subCategories = Category::find($id)->subCategories;
        // dd($category);


        return response()->json($subCategories, 200);
        // return$id;
    }
    public function index()
    {
        $create_product_data = [];
        $create_product_data['categories'] = Category::where('status', 1)->get();
        $create_product_data['subcategories'] = SubCategory::where('status', 1)->get();
        $create_product_data['brands'] = Brand::where('status', 1)->get();
        $create_product_data['colors'] = Color::where('status', 1)->get();
        $create_product_data['units'] = Unit::where('status', 1)->get();
        $create_product_data['sizes'] = Size::where('status', 1)->get();
        // dd($create_product_data);
        return view('pages.products.addProduct', $create_product_data);
    }

    public function create(Request $request)
    {
        // return $request->all();

        DB::beginTransaction();
        try {
            $product = new Product();
            $product->category_id = $request->category_id;
            $product->sub_category_id = $request->sub_category_id;
            $product->brand_id = $request->brand_id;
            $product->unit_id = $request->unit_id;
            $product->name = $request->name;
            $product->code = $request->code;
            $product->model = $request->model;
            $product->regular_price = $request->regular_price;
            $product->selling_price = $request->selling_price;
            $product->meta_tag = $request->meta_tag;
            $product->meta_description = $request->meta_description;
            $product->short_description = $request->short_description;
            $product->long_description = $request->long_description;
            $product->status = $request->status;



            if ($request->file('image')) {
                $imageName = Str::random(10) . time() . '.' . $request->file('image')->getClientOriginalName();
                $request->image->move(public_path('product-images/'), $imageName);
                $product->image = 'product-images/' . $imageName;
            } else {
                $product->image = 'dummy.png';
            }

            $product->save();
            $product->sizes()->attach($request->size_id);
            $product->colors()->attach($request->color_id);

            if ($request->file('other_images')) {
                foreach ($request->file('other_images') as $file) {
                    $otherImages = new OtherImage();
                    $imageName = Str::random(10) . time() . '.' . $file->getClientOriginalName();
                    // $imageName = $request->file()->getClientOriginalName();
                    $file->move(public_path('product-images/'), $imageName);
                    $otherImages->image = 'product-images/' . $imageName;
                    $otherImages->product_id = $product->id;
                    $otherImages->save();
                }
            }
        } catch (\Throwable $th) {
            dd($th);
            DB::rollback();
        }

        DB::commit();
        // dd('');
        return redirect()->back();
    }

    public function update(Product $product, Request $request)
    {

        // return $product;
        DB::beginTransaction();
        try {
            $product->category_id = $request->category_id;
            $product->sub_category_id = $request->sub_category_id;
            $product->brand_id = $request->brand_id;
            $product->unit_id = $request->unit_id;
            $product->name = $request->name;
            $product->code = $request->code;
            $product->model = $request->model;
            $product->regular_price = $request->regular_price;
            $product->selling_price = $request->selling_price;
            $product->meta_tag = $request->meta_tag;
            $product->meta_description = $request->meta_description;
            $product->short_description = $request->short_description;
            $product->long_description = $request->long_description;
            $product->status = $request->status;

            if ($request->file('image')) {
                if (fileExists($product->image)) {
                    if ($product->image !== 'dummy.png') {
                        unlink($product->image);
                    }
                    $imageName = Str::random(10) . time() . '.' . $request->file('image')->getClientOriginalName();
                    $request->image->move(public_path('product-images/'), $imageName);
                    $product->image = 'product-images/' . $imageName;
                }
            } else {
                $product->image = $product->image;
            }

            $product->save();
            $product->sizes()->sync($request->size_id);
            $product->colors()->sync($request->color_id);

            if ($request->file('other_images')) {

                foreach ($product->otherImages as $image) {
                    if (fileExists($image->image)) {

                        unlink($image->image);
                        $image->delete();
                    }
                }
                foreach ($request->file('other_images') as $file) {
                    $otherImages = new OtherImage();
                    $imageName = Str::random(10) . time() . '.' . $file->getClientOriginalName();
                    // $imageName = $request->file()->getClientOriginalName();
                    $file->move(public_path('product-images/'), $imageName);
                    $otherImages->image = 'product-images/' . $imageName;
                    $otherImages->product_id = $product->id;
                    $otherImages->save();
                }
            }
        } catch (\Throwable $th) {
            dd($th);
            DB::rollback();
        }
        DB::commit();

        return redirect()->route('product.manage')->with('message',"product updated");


    }

    public function manage()
    {
        $products = Product::orderBy('id', 'desc')->take(500)->get(['id', 'name', 'selling_price', 'regular_price', 'image', 'code', 'category_id', 'short_description', 'brand_id']);
        // dd($products);
        return view('pages.products.manageProducts', compact('products'));
    }

    public function details($id)
    {
        $product = Product::find($id);
        $product->load('category', 'subcategory', 'brand', 'unit', 'colors', 'sizes', 'otherImages');
        // dd($product);
        return view('pages.products.viewProduct', ['product' => $product]);
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $product->load('category', 'subcategory', 'brand', 'unit', 'colors', 'sizes', 'otherImages');

        $create_product_data = [];
        $create_product_data['product'] = $product;
        $create_product_data['categories'] = Category::where('status', 1)->get();
        $create_product_data['subcategories'] = SubCategory::where('status', 1)->get();
        $create_product_data['brands'] = Brand::where('status', 1)->get();
        $create_product_data['colors'] = Color::where('status', 1)->get();
        $create_product_data['units'] = Unit::where('status', 1)->get();
        $create_product_data['sizes'] = Size::where('status', 1)->get();
        // dd($create_product_data);
        // dd($product);
        return view('pages.products.editProduct', $create_product_data);
    }

    public function destroy(Product $product)
    {
        DB::beginTransaction();
        try {
            if (fileExists($product->image) && $product->image !== 'dummy.png') {
                unlink($product->image);
            }

            foreach ($product->otherImages as $image) {
                if (fileExists($image->image)) {

                    unlink($image->image);
                    $image->delete();
                }
            }
            
            $product->delete();

        } catch (\Throwable $th) {
            dd($th);
            DB::rollback();
        }

        DB::commit();
        return redirect()->route('product.manage')->with('message', "product updated");

    }
}
