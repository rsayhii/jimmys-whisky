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

// Policy Routes
Route::view('/terms-conditions', 'site.policy.terms')->name('policy.terms');
Route::view('/shipping-policy', 'site.policy.shipping')->name('policy.shipping');
Route::view('/returns-exchanges', 'site.policy.returns')->name('policy.returns');
Route::view('/privacy-policy', 'site.policy.privacy')->name('policy.privacy');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/signup', [AuthController::class, 'showSignup'])->name('signup');
Route::post('/signup', [AuthController::class, 'signup'])->name('signup.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;

Route::prefix('admin')->group(function () {
    // Admin Authentication Routes (Guest only for login)
    Route::group([], function () {
        Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
        Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login.post');
    });

    // Admin Protected Routes
    Route::middleware(['auth', 'admin'])->group(function () {
        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
        
        Route::get('/', function() {
            return redirect()->route('admin.dashboard');
        });

        Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');
        
        // Product Routes
        Route::get('/products', [ProductController::class, 'index'])->name('admin.products.products');
        Route::get('/products/create', [ProductController::class, 'create'])->name('admin.products.create');
        Route::post('/products', [ProductController::class, 'store'])->name('admin.products.store');
        Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
        Route::put('/products/{product}', [ProductController::class, 'update'])->name('admin.products.update');
        Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('admin.products.destroy');
        
        // Order Routes
        Route::get('/orders', [\App\Http\Controllers\Admin\OrderController::class, 'index'])->name('admin.orders.orders');
        Route::get('/orders/export', [\App\Http\Controllers\Admin\OrderController::class, 'export'])->name('admin.orders.export');
        Route::get('/orders/{order}', [\App\Http\Controllers\Admin\OrderController::class, 'show'])->name('admin.orders.show');
        Route::get('/orders/{order}/invoice', [\App\Http\Controllers\Admin\OrderController::class, 'invoice'])->name('admin.orders.invoice');
        Route::patch('/orders/bulk-update', [\App\Http\Controllers\Admin\OrderController::class, 'bulkUpdate'])->name('admin.orders.bulk_update');
        Route::patch('/orders/{order}', [\App\Http\Controllers\Admin\OrderController::class, 'update'])->name('admin.orders.update');

        Route::get('/membership', [\App\Http\Controllers\Admin\MembershipController::class, 'index'])->name('admin.membership.membership');
        Route::get('/view-membership/{id}', [\App\Http\Controllers\Admin\MembershipController::class, 'viewPlan'])->name('admin.membership.view-membership');
        Route::get('/refill-requests', [\App\Http\Controllers\Admin\MembershipController::class, 'refillRequests'])->name('admin.membership.refill-requests');
        Route::get('/view-refill-request/{id}', [\App\Http\Controllers\Admin\MembershipController::class, 'viewRefillRequest'])->name('admin.membership.view-refill-request');
        Route::put('/update-refill-request/{id}', [\App\Http\Controllers\Admin\MembershipController::class, 'updateRefillRequest'])->name('admin.membership.update-refill-request');
        
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
        $recentRefills = \App\Models\RefillRequest::where('user_id', auth()->id())
            ->with('product')
            ->latest()
            ->take(5)
            ->get();
        return view('site.dashboard.membership', compact('recentRefills'));
    });

    Route::get('/user-refill-requests', [\App\Http\Controllers\Site\RefillRequestController::class, 'index'])->name('user.refill-requests');
    
    Route::get('/user-new-refill-request', [\App\Http\Controllers\Site\RefillRequestController::class, 'create'])->name('user.refill-request.create');
    Route::post('/user-new-refill-request', [\App\Http\Controllers\Site\RefillRequestController::class, 'store'])->name('user.refill-request.store');

    Route::get('/user-view-refill-request/{id}', [\App\Http\Controllers\Site\RefillRequestController::class, 'show'])->name('user.refill-request.show');
    Route::put('/user-refill-request/{id}/note', [\App\Http\Controllers\Site\RefillRequestController::class, 'updateNote'])->name('user.refill-request.update-note');
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
