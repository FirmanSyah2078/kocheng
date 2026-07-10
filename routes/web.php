<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', function () {
    return view('users.index');
});

Route::get('/', function () {
    return view('users.index');
})->name('home');

Route::get('/products', [ProductController::class, 'index'])->name('product');

Route::get('/about', function () {
    return view('users.about');
})->name('about');

Route::get('/contact', function () {
    return view('users.contact');
})->name('contact');

Route::get('/cart', [CartController::class, 'index'])->name('cart');

Route::post('/cart/update/{id}/{action}', [CartController::class, 'updateQuantity'])->name('cart.update');
Route::post('/cart/remove/{id}', [CartController::class, 'removeItem'])->name('cart.remove');

Route::get('/payment', function () {
    return view('users.payment');
})->name('payment');

Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');

Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');

Route::get('/dashboard/delete/{id}', [UserController::class, 'destroy'])->name('dashboard.delete');

Route::get('/dashboard/edit/{id}', [UserController::class, 'edit'])->name('dashboard.edit');

Route::post('/dashboard/update/{id}', [UserController::class, 'update'])->name('dashboard.update');
