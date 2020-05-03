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

Route::get('/', 'HomePageController@index')->name('home');


Route::get('/products', 'ProductsController@index')->name('products');

Route::get('/products/{product}', 'ProductsController@show')->name('product.show');


// Route::get('/products/detail', function () {
//     return view('ecom.show');
// });
