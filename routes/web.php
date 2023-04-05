<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ItemInfoController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/admin', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('index');
})->name('index');

Route::resource('/',HomeController::class);

Auth::routes();

Route::group(['prefix' => 'admin'],function(){
    Route::view('/home', 'admin.home')->name('home');

    Route::resource('/item',ItemController::class);
    Route::resource('/category',CategoryController::class);
});

Route::get('item-info/{id}',[ItemInfoController::class,'show'])->name('item-info.show');