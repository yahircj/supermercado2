<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;

Route::get('/', function () {
    return view('welcome');
});

// Autenticación
// Auth::Routes();

// Públicas
Route::get('/', [HomeController::class, 'index'])->name('home');
// Route::get('/productos', [ProductController::class, 'index'])->name('products.index');
// Route::get('/productos/{product}', [ProductController::class, 'show'])->name('products.show');

// // Carrito (requiere autenticación)
// Route::middleware('auth')->group(function () {
//     Route::prefix('cart')->group(function () {
//         Route::get('/', [CartController::class, 'index'])->name('cart.index');
//         Route::post('/add/{product}', [CartController::class, 'add'])->name('cart.add');
//         Route::put('/update/{rowId}', [CartController::class, 'update'])->name('cart.update');
//         Route::delete('/remove/{rowId}', [CartController::class, 'remove'])->name('cart.remove');
//     });

//     // Checkout
//     Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
//     Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');

//     // Historial de pedidos
//     Route::get('/mis-pedidos', [OrderController::class, 'index'])->name('orders.index');
//     Route::get('/mis-pedidos/{order}', [OrderController::class, 'show'])->name('orders.show');
// });