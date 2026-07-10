<?php

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

Route::get('/product', function () {
    return view('users.product');
})->name('product');

Route::get('/about', function () {
    return view('users.about');
})->name('about');

Route::get('/contact', function () {
    return view('users.contact');
})->name('contact');
