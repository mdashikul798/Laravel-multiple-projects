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

/**
 * Auth Route
 *
 * Auth Route is for the authentigation of the user
 * user route is defiened from here
 * this route redirection the app home page
 */

Auth::routes();
Route::get('/home', 'Home\HomeController@index')->name('home');

/**
 * Admin Route
 *
 * All route for the admin is defined here
 * the admin is defined from here
 */

Route::post('/admin-dashboard', 'Admin\AdminController@index')->name('admin.home');

/**
 * Product-Category Route
 *
 * All route for the product is defined here
 * the product is defined from here
 */

Route::get('/manage-category', 'Product\CategoryController@index')->name('category');
Route::get('/add-category', 'Product\CategoryController@addCategory')->name('add.category');
Route::post('/save-category', 'Product\CategoryController@saveCategory')->name('save.category');

/**
 * Product Route
 *
 * All route for the product is defined here
 * the product is defined from here
 */

Route::get('/manage-product', 'Product\ProductController@index')->name('manage.product');
Route::get('/add-product', 'Product\ProductController@addProduct')->name('add.product');
Route::post('save-product', 'Product\ProductController@saveProduct')->name('save.product');


/*
|--------------------------------------------------------------------------
| All Front-end Route is starting from here
|--------------------------------------------------------------------------
*
 * Home Route
 *
 * This route if for the home page
 *
 */

Route::get('/', function () {
    return view('welcome');
});

/**
 * Stripe-Cart Route
 *
 * All route for the stripe payment is defined here
 * the stripe cart is defined from here
 */
		/*Stripe-Login system is here*/
Route::get('/stripe-home', 'Stripe\StripeController@index')->name('stripe.home');

Route::get('/stripe-login', 'Stripe\UserController@getLogin')->name('stripe.login');
Route::post('/stripe-login', 'Stripe\UserController@postLogin')->name('stripe.login');
Route::get('/stripe-register', 'Stripe\UserController@userRegister')->name('stripe.register');
Route::get('/stripe-logout', 'Stripe\UserController@stripeLogout')->name('stripe.logout');
Route::post('/stripe-register', 'Stripe\UserController@addUser')->name('stripe.register');

		/*Stripe Payment Route*/
Route::get('/stripe-user', 'Stripe\StripeController@userProfile')->name('stripe.user.profile');
Route::get('/add-to-cart/{id}', 'Stripe\StripeController@getAddToCart')->name('product.addToCart');
Route::get('/stripe-getCart', 'Stripe\StripeController@getCart')->name('stripe.getCart');
Route::get('/stripe-addQty/{id}', 'Stripe\StripeController@addQty')->name('stripe.addQty');
Route::get('/stripe-reduceQty/{id}', 'Stripe\StripeController@reduceQty')->name('stripe.reduceQty');
Route::get('/stripe-checkout', 'Stripe\StripeController@cartCheckout')->name('stripe.checkout');
Route::post('/stripe-payment', 'Stripe\StripeController@stripePay')->name('stripe.payment');

/*Route::get('/stripe-checkout', [
	'users' => 'Stripe\StripeController@cartCheckout',
	'as' => 'stripe.checkout',
	'middleware' => 'auth'
] );

Route::post('/stripe-payment', [
	'users' => 'Stripe\StripeController@stripePay',
	'as' => 'stripe.payment',
	'middleware' => 'auth'
] );*/

/**
 * Paypal-Cart Route
 *
 * All route for the paypal payment is defined here
 * the paypal cart is defined from here
 */

Route::get('/paypal-home', 'Paypal\PaypalController@index')->name('paypal.home');