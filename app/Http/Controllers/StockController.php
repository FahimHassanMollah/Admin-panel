<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use App\Models\Supplier;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index()
    {

        return view('pages.stock.addStock',[
            'suppliers' => Supplier::where('status',1)->get(),
            'products' => Product::where('status',1)->get(),
            'colors' => Color::where('status',1)->get(),
            'sizes' => Size::where('status',1)->get(),
        ]);
    }
    public function getAllData()
    {

       return response()->json([
            'suppliers' => Supplier::where('status', 1)->get(),
            'products' => Product::where('status', 1)->get(),
            'colors' => Color::where('status', 1)->get(),
            'sizes' => Size::where('status', 1)->get(),
        ], 200);
    }
}
