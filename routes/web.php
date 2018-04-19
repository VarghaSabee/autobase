<?php

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

Route::get('/','HomeController@index')->name('index');

Route::get('login/{provider}', 'SocialLogin@redirectToProvider')->name("social.login");
Route::get('login/{provider}/callback', 'SocialLogin@handleProviderCallback');

Auth::routes();

/*Admins*/
Route::prefix('admin')->group(function() {
    Route::get('/login',
        'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('logout/', 'Auth\AdminLoginController@logout')->name('admin.logout');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
}) ;

Route::get('/home', 'HomeController@index')->name('home');


Route::resource('users', 'UsersController');

Route::resource('autobuses', 'AutobusesController');

Route::resource('drivers', 'DriversController');

Route::post('routes/search', 'RoutesController@search')->name('routes.find');
Route::resource('routes', 'RoutesController');



Route::resource('bookings', 'BookingController');

Route::resource('admins', 'AdminsController');

Route::resource('cities', 'CitiesController');


Route::prefix('payment')->group(function() {
    Route::get('/paywithCreditCard', 'PaymentController@paywithCreditCard');
    Route::get('/paywithPaypal', 'PaymentController@paywithPaypal');
    Route::get('/success', 'PaymentController@success');
    Route::get('/fails', 'PaymentController@fails');
    Route::get('/button', 'PaymentController@button');
});

//Route::get('payment/paywithCreditCard', 'PaymentController@paywithCreditCard');
//Route::get('payment/paywithPaypal', 'PaymentController@paywithPaypal');
//Route::get('payment/buttons', 'PaymentController@button');
//Route::get('payment/buttons', 'PaymentController@button');
Route::resource('ratings', 'RatingController');
