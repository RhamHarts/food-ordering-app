<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DashboardController;

// Make dashboard the default landing page
Route::get('/', [DashboardController::class, 'index']);

// Dashboard route
Route::get('/dashboard', [DashboardController::class, 'index']);

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
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::post('/order/checkout', [OrderController::class, 'checkout'])->name('order.checkout');
Route::patch('/orders/{order}/complete', [OrderController::class, 'complete'])->name('orders.complete');
Route::patch('/orders/{order}/cancel', [OrderController::class, 'cancel'])->name('orders.cancel');
Route::post('/orders/bulk-complete', [OrderController::class, 'bulkComplete'])->name('orders.bulk-complete');
Route::post('/orders/bulk-cancel', [OrderController::class, 'bulkCancel'])->name('orders.bulk-cancel');
