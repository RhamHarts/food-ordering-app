<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;

// Make dashboard the default landing page
Route::get('/', function () {
    return view('dashboard');
});

// Dashboard route (optional, since it's now the default)
Route::get('/dashboard', function () {
    return view('dashboard');
});

// Menu routes
Route::get('/menu', [MenuController::class, 'index']);
Route::get('/order/{id}', function ($id) {
    return view('order', ['menu_id' => $id]);
});
Route::post('/order', [MenuController::class, 'order'])->name('order.submit');

// Other routes
Route::get('/orders', function () {
    return view('dashboard');
});

Route::get('/customers', function () {
    return view('dashboard');
});

Route::get('/reports', function () {
    return view('dashboard');
});

Route::get('/settings', function () {
    return view('dashboard');
});


// Cart routes
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::patch('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');

// Order routes
Route::post('/order/checkout', [OrderController::class, 'checkout'])->name('order.checkout');
