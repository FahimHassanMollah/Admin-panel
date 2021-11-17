<?php

// use App\Http\Controllers\CategoryController;

// use App\Http\Controllers\CategoryController;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;

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
});






Auth::routes();



Route::get('/home', [HomeController::class, 'index'])->name('home');
