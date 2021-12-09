<?php

use App\Http\Controllers\Auth\FacebookController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ConfirmationController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Controllers\WebhookController;
use TCG\Voyager\Facades\Voyager;

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

Route::get('/', [HomePageController::class, 'index'])->name('home');

//Route::middleware(['auth'])->group(function () {
//});
Route::get('/products', [ProductsController::class, 'index'])->name('products');

Route::get('/products/{product}', [ProductsController::class, 'show'])->name('product.show');


Route::get('/cart', [CartController::class, 'index'])->name('cart.home');
Route::post('/cart', [CartController::class, 'store'])->name('cart.store');
Route::delete('/cart/{product}', [CartController::class, 'destroy'])->name('cart.destroy');
Route::patch('/cart/{product}', [CartController::class, 'update'])->name('cart.update');

Route::post('/cart/addtowish/{product}', [CartController::class, 'addtowish'])->name('cart.addtowish');
//Route::delete('/saveForLater/{product}', 'SaveForLaterController@destroy')->name('remove.addtowish');
//Route::post('/saveForLater/switchToCart/{product}', 'SaveForLaterController@switchToCart')->name('add.switchToCart');

Route::get('empty', function () {
    Cart::destroy();
});
//Route::post('/coupon', 'CouponsController@store')->name('coupon.store');
//Route::delete('/coupon', 'CouponsController@destroy')->name('coupon.destroy');
Route::post('/stripe_checkout', [CheckoutController::class, 'stripeCheckout'] )->name('stripe.checkout');
Route::get('/thankyou', [ConfirmationController::class, 'index'] )->name('confirmation.index');
Route::post('/thankyou', [ConfirmationController::class, 'create'] )->name('confirmation.post');
Route::get('/payment_error', [CheckoutController::class, 'stripeError'] )->name('stripe.error');
Route::post('/webhook/stripe/$2y$10$ext8gvtbBfsf960Iw5OWjei7k8tVKuktztfQ6XWatwrhvujz6bEL2', [WebHookController::class, 'stripeWebHook'] );
Route::get('/orderpdf/{order}', [CheckoutController::class, 'getPdf'])->name('orderPdf');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
Auth::routes();
Route::get('auth/google', [ GoogleController::class, 'redirectToGoogle'] );
Route::get('auth/google/callback', [ GoogleController::class, 'handleGoogleCallback'] );
Route::get('auth/facebook', [ FacebookController::class, 'redirectToFacebook'] );
Route::get('auth/facebook/callback', [ FacebookController::class, 'handleFacebookCallback'] );
