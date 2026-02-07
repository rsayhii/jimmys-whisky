<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Site\AuthController;
use App\Http\Controllers\Site\ProductController as SiteProductController;
use App\Http\Controllers\Site\CartController;
use App\Http\Controllers\Site\CheckoutController;

Route::get('/', function () {
    $bestsellers = \App\Models\Product::where('status', 'publish')->orderByDesc('qty')->take(8)->get();
    return view('site.home', compact('bestsellers')); 
});

Route::get('/collection', [SiteProductController::class, 'collection'])->name('collection');



Route::get('/product/{id}', [SiteProductController::class, 'show'])->name('product.show');
Route::get('/search', [SiteProductController::class, 'search'])->name('search');
Route::get('/search/suggest', [SiteProductController::class, 'suggest'])->name('search.suggest');
Route::get('/products/batch', [SiteProductController::class, 'getByIds'])->name('products.batch');


Route::get('/about', function () {
    return view('site.about');
});

Route::get('/wishlist', function () {
    return view('site.wishlist');
});

Route::get('/membership', function () {
    return view('site.membership');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/signup', [AuthController::class, 'showSignup'])->name('signup');
Route::post('/signup', [AuthController::class, 'signup'])->name('signup.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

use App\Http\Controllers\Admin\ProductController;

Route::prefix('admin')->group(function () {
    Route::view('/login', 'admin.auth.login')->name('admin.login');
    Route::view('/dashboard', 'admin.dashboard')->name('admin.dashboard');
    
    // Product Routes
    Route::get('/products', [ProductController::class, 'index'])->name('admin.products.products');
    Route::get('/products/create', [ProductController::class, 'create'])->name('admin.products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('admin.products.store');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('admin.products.update');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('admin.products.destroy');
    
    // Route::view('/create', 'admin.products.create')->name('admin.products.create'); // Replaced by controller
    // Route::view('/products/edit', 'admin.products.edit')->name('admin.products.edit'); // Replaced by controller
    // Order Routes
    Route::get('/orders', [\App\Http\Controllers\Admin\OrderController::class, 'index'])->name('admin.orders.orders');
    Route::get('/orders/export', [\App\Http\Controllers\Admin\OrderController::class, 'export'])->name('admin.orders.export');
    Route::get('/orders/{order}', [\App\Http\Controllers\Admin\OrderController::class, 'show'])->name('admin.orders.show');
    Route::patch('/orders/bulk-update', [\App\Http\Controllers\Admin\OrderController::class, 'bulkUpdate'])->name('admin.orders.bulk_update');
    Route::patch('/orders/{order}', [\App\Http\Controllers\Admin\OrderController::class, 'update'])->name('admin.orders.update');

    Route::view('/membership', 'admin.membership.membership')->name('admin.membership.membership');
    Route::view('/view-membership', 'admin.membership.view-membership')->name('admin.membership.view-membership');
    Route::view('/refill-requests', 'admin.membership.refill-requests')->name('admin.membership.refill-requests');
    Route::view('/view-refill-request', 'admin.membership.view-refill-request')->name('admin.membership.view-refill-request');
    
    // Category Routes
    Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class)->names([
        'index' => 'admin.categories.index',
        'store' => 'admin.categories.store',
        'update' => 'admin.categories.update',
        'destroy' => 'admin.categories.destroy',
    ])->except(['create', 'edit', 'show']);

    // Coupon Routes
    Route::resource('coupons', \App\Http\Controllers\Admin\CouponController::class)->names([
        'index' => 'admin.coupons',
        'store' => 'admin.coupons.store',
        'update' => 'admin.coupons.update',
        'destroy' => 'admin.coupons.destroy',
    ])->except(['create', 'edit', 'show']);
    Route::get('/contact-queries', [\App\Http\Controllers\Admin\ContactQueryController::class, 'index'])->name('admin.contact-query');
    Route::delete('/contact-queries/{id}', [\App\Http\Controllers\Admin\ContactQueryController::class, 'destroy'])->name('admin.contact-query.destroy');
});


use App\Http\Controllers\Site\AddressController;
use App\Http\Controllers\Site\ProfileController;
use App\Http\Controllers\Site\ReviewController;

Route::middleware(['auth'])->group(function () {
    Route::get('/user-order', [\App\Http\Controllers\Site\OrderController::class, 'index'])->name('site.dashboard.orders');
    Route::get('/user-order/{id}/invoice', [\App\Http\Controllers\Site\OrderController::class, 'invoice'])->name('site.dashboard.invoice');

    Route::post('/products/{id}/reviews', [ReviewController::class, 'store'])->name('reviews.store');

    Route::get('/user-account', [ProfileController::class, 'index'])->name('user.account');
    Route::put('/user-account', [ProfileController::class, 'update'])->name('user.account.update');
    Route::get('/user-address', [AddressController::class, 'index'])->name('user.address');
    Route::post('/user-address', [AddressController::class, 'store'])->name('user.address.store');
    Route::put('/user-address/{address}', [AddressController::class, 'update'])->name('user.address.update');
    Route::delete('/user-address/{address}', [AddressController::class, 'destroy'])->name('user.address.destroy');
    Route::post('/user-address/{address}/default', [AddressController::class, 'setDefault'])->name('user.address.default');

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
});

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/add-to-cart/{id}', [CartController::class, 'add'])->name('cart.add');
Route::patch('/update-cart', [CartController::class, 'update'])->name('cart.update');
Route::delete('/remove-from-cart', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/clear-cart', [CartController::class, 'clear'])->name('cart.clear');

Route::post('/cart/coupon', [CartController::class, 'applyCoupon'])->name('coupon.apply');
Route::delete('/cart/coupon', [CartController::class, 'removeCoupon'])->name('coupon.remove');

Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');


use App\Http\Controllers\Site\ContactController;

Route::get('/contact', [ContactController::class, 'index'])
    ->name('contact');

Route::post('/contact', [ContactController::class, 'store'])
    ->name('contact.store');
