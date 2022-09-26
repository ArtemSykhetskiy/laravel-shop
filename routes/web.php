<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('search', [\App\Http\Controllers\HomeController::class, 'search'])->name('home.search');

Route::get('login', [\App\Http\Controllers\Auth\LoginController::class, 'index'])->name('login');
Route::post('login', [\App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login.verify');

Route::get('register', [\App\Http\Controllers\Auth\RegisterController::class, 'index'])->name('register.index');
Route::post('register', [\App\Http\Controllers\Auth\RegisterController::class, 'registration'])->name('register');

Route::group(['middleware' => ['auth']], function() {
    Route::get('logout', [\App\Http\Controllers\Auth\LogoutController::class, 'logout'])->name('logout');
});
Route::group(['middleware' => ['auth']], function() {
    /**
     * Verification Routes
     */
    Route::get('/email/verify', [\App\Http\Controllers\Auth\VerificationController::class, 'show'])->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', [\App\Http\Controllers\Auth\VerificationController::class, 'verify'])->name('verification.verify')->middleware(['signed']);
    Route::post('/email/resend', [\App\Http\Controllers\Auth\VerificationController::class, 'resend'])->name('verification.resend');

    Route::name('profile.')->prefix('profile')->group(function (){
        Route::get('', [\App\Http\Controllers\User\UserController::class, 'index'])->name('user');
        Route::get('order/{order}', [\App\Http\Controllers\User\UserController::class, 'show'])
            ->middleware('can:view,order')
            ->name('order.detail');
        Route::put('order/{order}/update', [\App\Http\Controllers\User\UserController::class, 'update'])
            ->name('status.update');
    });
});

Route::name('admin.')->prefix('admin')->middleware(['auth', 'admin'])->group(function (){
    Route::get('dashboard', \App\Http\Controllers\Admin\DashboardController::class)->name('dashboard')->middleware('admin');

    Route::resource('products', \App\Http\Controllers\Admin\ProductController::class)->except('show');
    Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class)->except('show');

    Route::get('orders', [\App\Http\Controllers\Admin\OrdersController::class, 'index'])->name('orders');
    Route::get('order/{order}/edit', [\App\Http\Controllers\Admin\OrdersController::class, 'edit'])->name('order.edit');
    Route::put('order/{order}/edit', [\App\Http\Controllers\Admin\OrdersController::class, 'update'])->name('order.update');
    Route::get('orders/search', [\App\Http\Controllers\Admin\OrdersController::class, 'search'])->name('order.search');

    Route::get('promocodes', [\App\Http\Controllers\Admin\PromocodeController::class, 'index'])->name('promocodes.index');
    Route::get('promocodes/create', [\App\Http\Controllers\Admin\PromocodeController::class, 'create'])->name('promocodes.create');
    Route::post('promocodes/store', [\App\Http\Controllers\Admin\PromocodeController::class, 'store'])->name('promocodes.store');
    Route::get('promocodes/{promocode}', [\App\Http\Controllers\Admin\PromocodeController::class, 'show'])->name('promocodes.show');
    Route::delete('promocodes/{promocode}', [\App\Http\Controllers\Admin\PromocodeController::class, 'destroy'])->name('promocodes.destroy');
    Route::post('promocodes/apply', [\App\Http\Controllers\Admin\PromocodeController::class, 'apply'])->name('promocodes.apply');

});

Route::get('products', [\App\Http\Controllers\ProductController::class, 'index'])->name('products');
Route::get('products/{product}', [\App\Http\Controllers\ProductController::class, 'show'])->name('show.product');

Route::get('categories', [\App\Http\Controllers\CategoryController::class, 'index'])->name('categories');
Route::get('categories/{category}', [\App\Http\Controllers\CategoryController::class, 'show'])->name('show.category');

Route::get('cart', [\App\Http\Controllers\CartController::class, 'index'])->name('cart');
Route::post('cart/{product}', [\App\Http\Controllers\CartController::class, 'add'])->name('cart.add');
Route::delete('cart', [\App\Http\Controllers\CartController::class, 'remove'])->name('cart.remove');
Route::post('cart/{product}/count', [\App\Http\Controllers\CartController::class, 'countUpdate'])->name('cart.count.update');

Route::get('checkout', \App\Http\Controllers\CheckoutController::class)->name('checkout');

Route::get('wishlist', [\App\Http\Controllers\WishesController::class, 'index'])->name('wishlist')->middleware('auth');
Route::post('wishlist/{product}/add', [\App\Http\Controllers\WishesController::class, 'add'])->name('wishlist.add')->middleware('auth');
Route::delete('wishlist/{product}/delete', [\App\Http\Controllers\WishesController::class, 'delete'])->name('wishlist.remove')->middleware('auth');

Route::post('order/create', [\App\Http\Controllers\OrderController::class, 'create'])->name('order.create');
Route::get('thankyou',function (){
    return view('site/cart/thank_you');
})->name('thankYou');




