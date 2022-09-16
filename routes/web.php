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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('login', [\App\Http\Controllers\Auth\LoginController::class, 'index'])->name('login');
Route::post('login', [\App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login.verify');

Route::get('register', [\App\Http\Controllers\Auth\RegisterController::class, 'index'])->name('register.index');
Route::post('register', [\App\Http\Controllers\Auth\RegisterController::class, 'registration'])->name('register');

Route::group(['middleware' => ['auth']], function() {
    Route::get('logout', [\App\Http\Controllers\Auth\LogoutController::class, 'logout'])->name('logout');
});
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::name('admin.')->prefix('admin')->middleware(['auth', 'admin'])->group(function (){
    Route::get('dashboard', \App\Http\Controllers\Admin\DashboardController::class)->name('dashboard')->middleware('admin');

    Route::resource('products', \App\Http\Controllers\ProductController::class)->except('show');
    Route::resource('categories', \App\Http\Controllers\CategoryController::class)->except('show');

});


