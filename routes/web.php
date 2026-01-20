<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Admin Controllers
|--------------------------------------------------------------------------
*/
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\SellerController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\ProductImageController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\CartController as AdminCartController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;

/*
|--------------------------------------------------------------------------
| Frontend Controllers
|--------------------------------------------------------------------------
*/
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\supplierRequestController;
use App\Http\Controllers\NewsLetterController;





/*
|--------------------------------------------------------------------------
| Public / Landing Page
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome'); // ya landing page
})->middleware('guest')->name('landing');

/*
|--------------------------------------------------------------------------
| Authentication Routes (Laravel Breeze)
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';

/*
|--------------------------------------------------------------------------
| Admin Panel Routes
|--------------------------------------------------------------------------
*/
Route::middleware('auth')
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // Dashboard
        Route::view('/dashboard', 'admin.dashboard')->name('dashboard');

        // CRUD
        Route::resource('categories', CategoryController::class);
        Route::resource('brands', BrandController::class);
        Route::resource('sellers', SellerController::class);
        Route::resource('products', AdminProductController::class);
        Route::resource('orders', OrderController::class);
        Route::resource('coupons', CouponController::class);

        // Product Images Delete
        Route::delete(
            'product-images/{image}',
            [ProductImageController::class, 'destroy']
        )->name('product-images.destroy');

        // Carts
        Route::get('carts', [AdminCartController::class, 'index'])->name('carts.index');
        Route::get('carts/{cart}', [AdminCartController::class, 'show'])->name('carts.show');
        Route::put('carts/{cart}', [AdminCartController::class, 'update'])->name('carts.update');
        
        // Payments
        Route::get('payments', [PaymentController::class, 'index'])->name('payments');
        Route::get('payments/{payment}', [PaymentController::class, 'show'])->name('payments.show');

        // Admin Profile
        Route::get('profile', [AdminProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('profile', [AdminProfileController::class, 'update'])->name('profile.update');
        Route::get('profile/change-password', [AdminProfileController::class, 'changePasswordForm'])->name('profile.change-password');
        Route::post('profile/change-password', [AdminProfileController::class, 'updatePassword'])->name('profile.update-password');
    });

/*
|--------------------------------------------------------------------------
| Frontend Routes (After Login)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    // Frontend Home
    Route::get('/home', function () {
        return view('frontend.index');
    })->name('frontend.home');

    // Products
    Route::get('/product', [ProductController::class, 'index'])->name('product.index');
    Route::get('/product/{slug}', [ProductController::class, 'show'])->name('product.show');

    Route::get('/product-listing-page', [ProductController::class, 'index'])->name('product-listing-page.index');


    // Cart
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

    // Deals (static for now)
    Route::get('/deals', function () {
        return view('frontend.product');
    })->name('deals');

    // User Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Wishlist & Messages placeholder routes
    Route::get('/wishlist', function () {
        return view('frontend.wishlist');
    })->name('wishlist.index');

    Route::get('/orders', function () {
        return view('frontend.order');
    })->name('orders.index');


    Route::get('/settings', function () {
        return view('frontend.settings');
    })->name('settings');

    Route::get('/order-updates', function () {
        return view('frontend.order-updates');
    })->name('order.updates');

    Route::get('/seller-chats', function () {
        return view('frontend.seller-chats');
    })->name('seller.chats');
});



Route::get('/home', [HomeController::class, 'index'])
    ->middleware('auth')
    ->name('frontend.home');

    Route::post('/supplier-request', [SupplierRequestController::class, 'store'])
     ->name('supplier-request.store');

    // Recommended Items (if needed separately)
   Route::get('/recommended-items', [HomeController::class, 'recommended'])->name('products.recommended');

    // Homepage
    Route::get('/', [ProductController::class, 'home'])->name('home');

    Route::post('/subscribe', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');


    // FOOTER ROUTES

    Route::get('/login', fn () => view('auth.login'))->name('login');
Route::get('/register', fn () => view('auth.register'))->name('register');

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/category/{slug}', [ProductController::class, 'index'])->name('category.products');

// frontend routes (web.php)
Route::middleware('auth')->group(function () {

    // Cart
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::delete('/cart/remove/{cart}', [CartController::class, 'remove'])->name('cart.remove');
    Route::delete('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');

    // Save for later
    Route::post('/cart/save-for-later/{cart}', [CartController::class, 'saveForLater'])
        ->name('cart.saveLater');

    Route::post('/move-to-cart/{savedItem}', [CartController::class, 'moveToCart'])
        ->name('cart.move');

    // Coupon
    Route::post('/cart/apply-coupon', [CartController::class, 'applyCoupon'])
        ->name('cart.applyCoupon');

    // Checkout
    Route::post('/checkout', [CartController::class, 'processCheckout'])
       ->name('checkout.process');
 
 
       Route::post('/cart/update/{cart}', [CartController::class, 'update'])
    ->name('cart.update');


    // Save product from detail page for later
Route::post('/product/save-for-later/{product}',
    [CartController::class, 'saveForLaterFromDetail']
)->name('product.saveForLater');

Route::post('/cart/clear', [App\Http\Controllers\Frontend\CartController::class, 'clear'])
    ->name('cart.clear');



    
    });
