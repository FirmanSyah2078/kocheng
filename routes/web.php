<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
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

// Transaction
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/cart/update/{id}/{action}', [CartController::class, 'updateQuantity'])->name('cart.update');
Route::post('/cart/remove/{id}', [CartController::class, 'removeItem'])->name('cart.remove');
Route::post('/payment', [PaymentController::class, 'index'])->name('payment');
Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');

// Users
Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard.index');
Route::get('/dashboard/delete/{id}', [UserController::class, 'destroy'])->name('dashboard.delete');
Route::get('/dashboard/edit/{id}', [UserController::class, 'edit'])->name('dashboard.edit');
Route::post('/dashboard/update/{id}', [UserController::class, 'update'])->name('dashboard.update');

// Product
Route::get('/product/delete/{id}', [ProductController::class, 'destroy'])->name('product.delete');
Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
Route::post('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');

// Categories
Route::get('/categories/delete/{id}', [CategoryController::class, 'destroy'])->name('categories.delete');
Route::get('/categories/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
Route::post('/categories/update/{id}', [CategoryController::class, 'update'])->name('categories.update');

// Transaction
Route::get('/transaction/delete/{id}', [TransactionController::class, 'destroy'])->name('transaction.delete');
Route::get('/transaction/detail/{invoice}', [TransactionController::class, 'detail'])->name('transaction.detail');
Route::post('/transaction/update/{id}', [TransactionController::class, 'update'])->name('transaction.update');

