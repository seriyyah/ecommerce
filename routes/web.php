<?php

use Illuminate\Support\Facades\Route;
use Gloudemans\Shoppingcart\Facades\Cart;

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

Route::get('/', 'HomePageController@index')->name('home');


Route::get('/products', 'ProductsController@index')->name('products');

Route::get('/products/{product}', 'ProductsController@show')->name('product.show');


Route::get('/cart', 'CartController@index')->name('cart.home');
Route::post('/cart', 'CartController@store')->name('cart.store');
Route::delete('/cart/{product}', 'CartController@destroy')->name('cart.destroy');
Route::post('/cart/addtowish/{product}', 'CartController@addtowish')->name('cart.wishadd');

Route::get('/cart/addtowish', function(){
    return view('ecom.wish')->name('wishadd');

});
Route::get('empty', function(){
    Cart::destroy();
});




// Route::get('/products/detail', function () {
//     return view('ecom.show');
// });
