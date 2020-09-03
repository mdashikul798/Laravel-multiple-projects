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


Route::get('/', 'front\HomeController@index')->name('front-page');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/token/{remember_token}', 'Admin\ConfirmRegistration@varify')->name('user.verification');

/*Manually Add to cart routes*/
Route::get('carts', 'front\CartController@index')->name('carts');
Route::post('/addtocart', 'front\CartController@store')->name('cart.store');
Route::post('/update/{id}', 'front\CartController@updateCart')->name('update');
Route::post('/cartDelete/{id}', 'front\CartController@deleteCart')->name('cartDelete');
Route::get('/checkout', 'front\CartController@checkoutCart')->name('checkout');
Route::get('/invoice', 'front\CartController@createInvoice')->name('invoice');
Route::post('/payment', 'front\CartController@manualStripePay')->name('stripe.payment');

/*Add to cart routes using Package*/
Route::get('/cartHome', 'front\CartPackageController@packageHome')->name('cartHome');
Route::post('/cartStore', 'front\CartPackageController@cartStore')->name('package.cartStore');

Route::get('empty', function(){
	Cart::clear();
});
Route::get('items', function(){
	$cartCollection = Cart::getContent();
	$cartCollection->count();
	return $cartCollection;
});

Route::get('/packageManage', 'front\CartPackageController@packageManage')->name('packageManage');

Route::get('/packageCheckout', 'front\CartPackageController@packageCheckout')->name('packageCheckout');