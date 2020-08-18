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
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/add-to-cart/{product}', 'CartController@add')->name('cart.add')->middleware('auth');
Route::get('cart-value/', 'CartController@index')->name('cart.index');
Route::get('cart-delete/{itemId}', 'CartController@destroy')->name('cart.destroy');
Route::get('cart-update/{itemId}', 'CartController@update')->name('cart.update');
Route::get('/cart/checkout', 'CartController@checkout')->name('cart.checkout')->middleware('auth');

Route::resource('orders', 'OrderController')->middleware('auth');

Route::get('paypal/checkout/{order}', 'PayPalController@getExpressCheckout')->name('paypal.checkout');
Route::get('paypal/checkout-success/{order}', 'PayPalController@getExpressCheckoutSuccess')->name('paypal.success');
Route::get('paypal/checkout-cancel', 'PayPalController@cancelPage')->name('paypal.cancel');


Route::group(['as'=>'products.', 'prefix'=>'products'], function(){
    Route::get('/', 'ProductController@show')->name('all');
    Route::get('/{product}', 'ProductController@single')->name('single');
});

Route::group(['as'=>'user.',  'prefix'=>'user'], function(){
    Route::resource('profile', 'ProfileController');
    Route::get('profile/state/{id?}', 'ProfileController@getStates')->name('profile.state');
    Route::get('profile/city/{id?}', 'ProfileController@getCities')->name('profile.city');
    
});

Route::group(['as'=>'admin.', 'middleware'=>['auth', 'admin'], 'prefix'=>'admin'], function(){
    Route::get('/dashboard', 'AdminController@dashboard')->name('dashboard');
    Route::get('/customer', 'ProfileController@indexshow')->name('customer');
    Route::resource('product', 'ProductController');
    Route::resource('category', 'CategorieController');
});
