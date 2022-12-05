<?php

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

use App\Http\Controllers\PageController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;

Route::get('/',[PageController::class,'index'])->name('page.index');
Route::get('/detail/{slug}',[PageController::class,'detail'])->name('page.detail');
Route::get('/category/{category:slug}',[PageController::class,'postCategory'])->name('page.category');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware('auth')->prefix('dashboard')->group(function (){
    Route::resource('/category',CategoryController::class);
    Route::resource('/post',PostController::class);
    Route::resource('/photo',\App\Http\Controllers\PhotoController::class);
    Route::resource('/user',\App\Http\Controllers\UserController::class);
    Route::resource('/nation',\App\Http\Controllers\NationController::class);
});


