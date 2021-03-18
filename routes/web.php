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

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');


/*
======================
Client Site Routes
======================
*/ 

// Home Page
Route::get('/', 'Client\HomeController@index')->name('client.home.index');

// Send Page
Route::get('/send', 'Client\SendController@index')->name('client.send.index');
Route::get('/send/create', 'Client\SendController@create')->name('client.send.create');
Route::post('/send', 'Client\SendController@store')->name('client.send.store');


// Receive Page
Route::get('/receive', 'Client\ReceiveController@index')->name('client.receive.index');

// About Page
Route::get('/about', 'Client\AboutController@index')->name('client.about.index');

// Fees Page
Route::get('/fees', 'Client\FeesController@index')->name('client.fees.index');

// Help Page
Route::get('/help', 'Client\HelpController@index')->name('client.help.index');


/*
==========================
Client Admin Site Routes
==========================
*/

Route::prefix('profile')->group(function(){
    // Dashboard Page
    Route::get('', 'Client\Profile\ProfileController@index')->name('client.profile.index');
    Route::patch('/personal', 'Client\Profile\ProfileController@updatePersonalInfo')->name('client.profile.personal.update');
    Route::patch('/account', 'Client\Profile\ProfileController@updateAccount')->name('client.profile.account.update');
    Route::patch('/phone', 'Client\Profile\ProfileController@updatePhone')->name('client.profile.phone.update');
    Route::patch('/password', 'Client\Profile\ProfileController@updatePassword')->name('client.profile.password.update');
    Route::get('/dashboard', 'Client\Profile\DashboardController@index')->name('client.dashboard.index');
    Route::get('/transactions', 'Client\Profile\TransactionController@index')->name('client.transactions.index');
});


/*
==========================
Admin Site Routes
==========================
*/

Route::prefix('admin')->middleware('role')->group(function(){
	// Admin Dashboard Route
	Route::get('/dashboard', 'Admin\DashboardController@index')->name('admin.dashboard.index');

	// Admin Currency Route
	Route::get('/currency', 'Admin\CurrencyController@index')->name('admin.currency.index');
	Route::get('/currency/create', 'Admin\CurrencyController@create')->name('admin.currency.create');
	Route::post('/currency', 'Admin\CurrencyController@store')->name('admin.currency.store');
	Route::get('/currency/{id}/edit', 'Admin\CurrencyController@edit')->name('admin.currency.edit');
	Route::patch('/currency/{id}', 'Admin\CurrencyController@update')->name('admin.currency.update');
	Route::delete('/currency/{id}', 'Admin\CurrencyController@destroy')->name('admin.currency.destroy');

	// Admin Payment Method Route
	Route::get('/payment-method', 'Admin\PaymentMethodController@index')->name('admin.payment.method.index');
	Route::get('/payment-method/create', 'Admin\PaymentMethodController@create')->name('admin.payment.method.create');
	Route::post('/payment-method', 'Admin\PaymentMethodController@store')->name('admin.payment.method.store');
	Route::get('/payment-method/{id}/edit', 'Admin\PaymentMethodController@edit')->name('admin.payment.method.edit');
	Route::patch('/payment-method/{id}', 'Admin\PaymentMethodController@update')->name('admin.payment.method.update');
	Route::delete('/payment-method/{id}', 'Admin\PaymentMethodController@destroy')->name('admin.payment.method.destroy');

	// Admin Exchange Route
	Route::get('/exchange', 'Admin\ExchangeController@index')->name('admin.exchange.index');
	Route::patch('/exchange/{id}', 'Admin\ExchangeController@complete')->name('admin.exchange.complete');
	// Route::get('/payment-method/create', 'Admin\PaymentMethodController@create')->name('admin.payment.method.create');
	// Route::post('/payment-method', 'Admin\PaymentMethodController@store')->name('admin.payment.method.store');
	// Route::get('/payment-method/{id}/edit', 'Admin\PaymentMethodController@edit')->name('admin.payment.method.edit');
	// Route::patch('/payment-method/{id}', 'Admin\PaymentMethodController@update')->name('admin.payment.method.update');
	Route::delete('/exchange/{id}', 'Admin\ExchangeController@destroy')->name('admin.exchange.destroy');

	// Admin User Route
	Route::get('/users', 'Admin\UserController@index')->name('admin.user.index');
	Route::delete('/users/{id}', 'Admin\UserController@destroy')->name('admin.user.destroy');

	// Admin Fee Route
	Route::get('/fee', 'Admin\FeeController@index')->name('admin.fee.index');
	Route::get('/fee/{id}', 'Admin\FeeController@edit')->name('admin.fee.edit');
	Route::patch('/fee/{id}', 'Admin\FeeController@update')->name('admin.fee.update');
});
