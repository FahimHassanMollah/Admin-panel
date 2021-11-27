<?php



use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
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

});






Auth::routes();



Route::get('/home', [HomeController::class, 'index'])->name('home');
