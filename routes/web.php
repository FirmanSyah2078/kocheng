<?php

use App\Http\Controllers\CategoryController;
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

// Dashboard
Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard.index');
Route::get('/dashboard/delete/{id}', [UserController::class, 'destroy'])->name('dashboard.delete');
Route::get('/dashboard/edit/{id}', [UserController::class, 'edit'])->name('dashboard.edit');
Route::post('/dashboard/update/{id}', [UserController::class, 'update'])->name('dashboard.update');
Route::get('/categories/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
Route::post('/dashboard/update/{id}', [CategoryController::class, 'update'])->name('categories.update');

