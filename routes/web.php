<?php

use App\Http\Controllers\LandingController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Dashboard\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Dashboard\Admin\UserController as AdminUserController;
use App\Http\Controllers\Dashboard\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Dashboard\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Dashboard\Admin\TransactionController as AdminTransactionController;
use App\Http\Controllers\Dashboard\User\ProductController as UserProductController;
use App\Http\Controllers\Dashboard\User\CartController;
use App\Http\Controllers\Dashboard\User\PaymentController;
use Illuminate\Support\Facades\Route;

// Landing / halaman publik
Route::get('/', [LandingController::class, 'home'])->name('home');
Route::get('/about', [LandingController::class, 'about'])->name('about');
Route::get('/contact', [LandingController::class, 'contact'])->name('contact');

// Auth
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/signup', [AuthController::class, 'signup'])->name('signup');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login.attempt');
Route::post('/signup', [AuthController::class, 'register'])->name('signup.attempt');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard Admin — khusus role admin
Route::middleware(['auth', 'admin', 'nocache'])->prefix('dashboard/admin')->name('dashboard.admin.')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('index');

    Route::get('/users/{user}/edit', [AdminUserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [AdminUserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [AdminUserController::class, 'destroy'])->name('users.destroy');

    Route::get('/categories/{category}/edit', [AdminCategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/{category}', [AdminCategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{category}', [AdminCategoryController::class, 'destroy'])->name('categories.destroy');

    Route::get('/products/{product}/edit', [AdminProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [AdminProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [AdminProductController::class, 'destroy'])->name('products.destroy');

    Route::get('/transactions/{transaction:invoice_number}', [AdminTransactionController::class, 'detail'])->name('transactions.detail');
    Route::put('/transactions/{transaction}', [AdminTransactionController::class, 'update'])->name('transactions.update');
    Route::delete('/transactions/{transaction}', [AdminTransactionController::class, 'destroy'])->name('transactions.destroy');
});

// Dashboard User — khusus yang sudah login
Route::middleware(['auth', 'nocache'])->prefix('dashboard/user')->name('dashboard.user.')->group(function () {
    Route::get('/products', [UserProductController::class, 'index'])->name('products');

    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::post('/cart/add/{product}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::post('/cart/update/{product}/{action}', [CartController::class, 'updateQuantity'])->name('cart.update');
    Route::delete('/cart/remove/{product}', [CartController::class, 'removeItem'])->name('cart.remove');

    Route::get('/payment', [PaymentController::class, 'index'])->name('payment');
    Route::post('/payment', [PaymentController::class, 'store'])->name('payment.store');
});
