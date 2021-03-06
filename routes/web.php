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
    return view('index');
});

Auth::routes();

//-- I T E M S
Route::resource('/item', 'App\Http\Controllers\ItemController');
Route::get('/sales', [\App\Http\Controllers\ItemController::class, 'sale'])->name('item.sale');

//-- C A T E G O R I E S

Route::get('/categories', [\App\Http\Controllers\CategoryController::class, 'index']);
Route::resource('/category', 'App\Http\Controllers\CategoryController');
Route::post('/category/{category}', [\App\Http\Controllers\CategoryController::class, 'sort']);

//-- R E V I E W S

Route::resource('/review', 'App\Http\Controllers\ReviewController');


// -- U S E R S
Route::get('/user', [\App\Http\Controllers\UserController::class, 'index']);
Route::get('/user/{user}', [\App\Http\Controllers\UserController::class, 'info'])->name('user.show');
Route::get('/users', [\App\Http\Controllers\UserController::class, 'show'])->name('users.show');
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
Route::post('/finishorder', [\App\Http\Controllers\OrderController::class, 'finish'])->name('order.finish');
Route::put('/finishorder', [\App\Http\Controllers\OrderController::class, 'store'])->name('order.store');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// -- S H O P P I N G C A R T
Route::put('/addtocart/{item}', [\App\Http\Controllers\CartController::class, 'addToCart'])->name('item.cart');
Route::get('/cart', [\App\Http\Controllers\CartController::class, 'show'])->name('cart.show');
Route::delete('/cart/{index}', [\App\Http\Controllers\CartController::class, 'delete'])->name('cart.delete');
Route::put('/addcart/{index}', [\App\Http\Controllers\CartController::class, 'add'])->name('cart.add');
Route::put('/subcart/{index}', [\App\Http\Controllers\CartController::class, 'sub'])->name('cart.sub');
