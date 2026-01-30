<?php

use Illuminate\Support\Facades\Route;

// Home page route
Route::get('/', function () {
    return view('site.home'); // ye tumhara home page Blade file hai
});

Route::get('/collection', function () {
    return view('site.collection');
});

Route::get('/contact', function () {
    return view('site.contact');
});

Route::get('/single', function () {
    return view('site.single');
});


Route::get('/about', function () {
    return view('site.about');
});

Route::get('/wishlist', function () {
    return view('site.wishlist');
});



Route::prefix('admin')->group(function () {
    Route::view('/login', 'admin.login')->name('admin.login');
    Route::view('/dashboard', 'admin.dashboard')->name('admin.dashboard');
    Route::view('/products', 'admin.products')->name('admin.products');
    Route::view('/orders', 'admin.orders')->name('admin.orders');
    Route::view('/users', 'admin.users')->name('admin.users');
});