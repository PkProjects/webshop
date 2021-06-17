<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//-- I T E M S
Route::resource('/item', 'App\Http\Controllers\ItemController');

//-- C A T E G O R I E S

Route::get('/categories', [\App\Http\Controllers\CategoryController::class, 'index']);
Route::resource('/category', 'App\Http\Controllers\CategoryController');


// -- U S E R S
Route::get('/user', [\App\Http\Controllers\UserController::class, 'index']);
Route::get('/user/{user}', [\App\Http\Controllers\UserController::class, 'info']);
Route::get('/users', [\App\Http\Controllers\UserController::class, 'show']);
Route::get('/users/{user}', [\App\Http\Controllers\UserController::class, 'edit']);
Route::put('/users/{user}', [\App\Http\Controllers\UserController::class, 'update']);
Route::delete('/users/{user}', [\App\Http\Controllers\UserController::class, 'destroy']);

// -- O R D E R S
Route::get('/order', [\App\Http\Controllers\OrderController::class, 'index']);
Route::get('/order/{order}', [\App\Http\Controllers\OrderController::class, 'info']);
Route::get('/orders', [\App\Http\Controllers\OrderController::class, 'show'])->name('order.show');
Route::get('/orders/{order}', [\App\Http\Controllers\OrderController::class, 'edit'])->name('order.edit');
Route::put('/orders/{order}', [\App\Http\Controllers\OrderController::class, 'update']);
Route::delete('/orders/{order}', [\App\Http\Controllers\OrderController::class, 'destroy']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
