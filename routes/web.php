<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('site.home'); 
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

Route::get('/membership', function () {
    return view('site.membership');
});

Route::get('/login', function () {
    return view('site.auth.login');
})->name('login');

Route::get('/signup', function () {
    return view('site.auth.signup');
})->name('signup');

Route::prefix('admin')->group(function () {
    Route::view('/login', 'admin.auth.login')->name('admin.login');
    Route::view('/dashboard', 'admin.dashboard')->name('admin.dashboard');
    Route::view('/products', 'admin.products.products')->name('admin.products.products');
    Route::view('/create', 'admin.products.create')->name('admin.products.create');
    Route::view('/products/edit', 'admin.products.edit')->name('admin.products.edit');
    Route::view('/orders', 'admin.orders.orders')->name('admin.orders.orders');
    Route::view('/orders/show', 'admin.orders.show')->name('admin.orders.show');
    Route::view('/membership', 'admin.membership.membership')->name('admin.membership.membership');
    Route::view('/view-membership', 'admin.membership.view-membership')->name('admin.membership.view-membership');
    Route::view('/refill-requests', 'admin.membership.refill-requests')->name('admin.membership.refill-requests');
    Route::view('/view-refill-request', 'admin.membership.view-refill-request')->name('admin.membership.view-refill-request');
    Route::view('/categories', 'admin.category')->name('admin.category');
    Route::view('/coupons', 'admin.coupons')->name('admin.coupons');
    Route::view('/contact-queries', 'admin.contact-query')->name('admin.contact-query');
});


Route::get('/user-order', function () {
    return view('site.dashboard.order');
});

Route::get('/user-account', function () {
    return view('site.dashboard.account');
});

Route::get('/user-address', function () {
    return view('site.dashboard.address');
});

Route::get('/user-membership', function () {
    return view('site.dashboard.membership');
});

Route::get('/user-refill-requests', function () {
    return view('site.dashboard.refill-requests');
});

Route::get('/user-new-refill-request', function () {
    return view('site.dashboard.new-refill-request');
});

Route::get('/user-view-refill-request', function () {
    return view('site.dashboard.view-refill-request');
});

Route::get('/cart', function () {
    return view('site.cart');
});

Route::get('/checkout', function () {
    return view('site.checkout');
});
