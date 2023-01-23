<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductIndexController;
use App\Http\Controllers\StripeController;
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

Route::get('/welcome', function () {
  return view('welcome');
});

Route::get('/', function () {
  return view('welcome');
});



/* Product routes */
Route::get("/products", [ProductController::class, 'index']);
Route::get("/products/create", [ProductController::class, 'create']);
Route::post("/products", [ProductController::class, 'store'])->name('products.store');

Route::get("/products/{id}/edit", [ProductController::class, 'edit'])->name('products.edit');
Route::put("/products/{id}", [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy')->middleware('auth');

Route::get("/products/show/{id}", [ProductController::class, 'show'])->name('products.show');

/* Cart routes */
Route::post("/add_to_cart", [ProductController::class, 'addToCart'])->middleware('auth');
Route::get("/orders/cartList", [ProductController::class, 'cartList'])->middleware('auth');
Route::get("/removeCart/{id}", [ProductController::class, 'removeCart']);

/* Order Routes */
Route::get("/orders", [ProductController::class, 'ordersIndex'])->name('orders.index');
Route::get("/orders/orderNow", [ProductController::class, 'orderNow']);
Route::post("/orders/placeOrder", [ProductController::class, 'placeOrder']);
Route::get("/orders/myOrders", [ProductController::class, 'myOrders']);
Route::get("/orders/{id}/edit", [ProductController::class, 'editOrder'])->name('orders.edit');
Route::put("/orders/{id}", [ProductController::class, 'updateOrder'])->name('orders.update');

/* Stripe Payment routes */
Route::get('/orders/stripe', [StripeController::class, 'stripe'])->name('orders.stripe');
Route::post('/orders/stripe', [StripeController::class, 'stripePost'])->name('stripe.post');

/* Product Index routes */
Route::get("/productIndex/tvindex", [ProductIndexController::class, 'TVIndex'])->name('products.tvindex');
Route::get("/productIndex/consoleindex", [ProductIndexController::class, 'consoleIndex'])->name('products.consoleindex');
Route::get("/products/fridgeindex", [ProductIndexController::class, 'fridgeIndex'])->name('products.fridgeindex');
Route::get("/products/wmindex", [ProductIndexController::class, 'WMIndex'])->name('products.wmindex');
Route::get("/products/cookerindex", [ProductIndexController::class, 'cookerIndex'])->name('products.cookerindex');
Route::get("/products/mobileindex", [ProductIndexController::class, 'mobileIndex'])->name('products.mobileindex');



require __DIR__ . '/auth.php';

Auth::routes();
