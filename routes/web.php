<?php



use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\UnitController;
use Illuminate\Support\Facades\Route;
// CategoryController
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get(('/dashboard'), [DashboardController::class,'index'])->name('dashboard');


    // category routes
    Route::resource('category', '\App\Http\Controllers\CategoryController');
    Route::get(('/update-category-status/{category}'), [CategoryController::class,'updateCategoryStatus'])->name('category.status.update');

    // sub category
    Route::resource('sub-category', '\App\Http\Controllers\SubCategoryController');
    Route::get(('/update-sub-category-status/{subcategory}'), [SubCategoryController::class, 'updateSubCategoryStatus'])->name('sub-category.status.update');

    // brand
    Route::resource('brand', '\App\Http\Controllers\BrandController');
    Route::get(('/update-brand-status/{brand}'), [BrandController::class, 'updateBrandStatus'])->name('brand.status.update');

    // color
    Route::resource('color', '\App\Http\Controllers\ColorController');
    Route::get(('/update-color-status/{color}'), [ColorController::class, 'updateColorStatus'])->name('color.status.update');

    // size
    Route::resource('size', '\App\Http\Controllers\SizeController');
    Route::get(('/update-size-status/{size}'), [SizeController::class, 'updateSizeStatus'])->name('size.status.update');

    // unit
    Route::resource('unit', '\App\Http\Controllers\UnitController');
    Route::get(('/update-unit-status/{unit}'), [UnitController::class, 'updateUnitStatus'])->name('unit.status.update');

    Route::get('/add-new-product',[ProductController::class,'index'])->name('product.add');

    Route::post('/add-new-product',[ProductController::class,'create'])->name('product.create');

    // manage product
    Route::get('/manage-product',[ProductController::class, 'manage'])->name('product.manage');

    // single product details
    Route::get('/product-details/{id}',[ProductController::class, 'details'])->name('product.details');

    // product edit
    Route::get('/product-edit/{id}',[ProductController::class, 'edit'])->name('product.edit');

    // get all sub category
    Route::get('/sub-categories/{id}',[ProductController::class, 'getSubCategories']);

});






Auth::routes();



Route::get('/home', [HomeController::class, 'index'])->name('home');
