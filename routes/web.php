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

Route::get('/', function () {
   return redirect('/login');
});
//Admin Routes
Route::match(['get', 'post'], '/admin', 'AdminController@login');
Route::get('/admin/settings', 'AdminController@settings');
Route::match(['get', 'post'], '/admin/update-pwd', 'AdminController@updatePassword');
Route::get('/logout', 'AdminController@logout');
Route::get('/admin/dashboard', 'AdminController@dashboard');
Route::get('/admin/check-pwd', 'AdminController@chkPassword');
//Client's Logout route
Route::get('client/logout', 'BookingController@logout');
//Client's Booking routes
Route::match(['get', 'post'], '/client/add_booking',['middleware' => 'auth', 'uses' => 'BookingController@book']);
Route::get('/client/view_bookings',['middleware' => 'auth', 'uses' => 'BookingController@viewBookings']);
Route::match(['get', 'post'], '/client/edit_booking/{id}',['middleware' => 'auth', 'uses' => 'BookingController@editCategory']);
Route::match(['get', 'post'], '/client/delete_booking/{id}',['middleware' => 'auth', 'uses' => 'BookingController@deleteCategory']);
//Client's payment routes
Route::match(['get', 'post'], '/client/make_payment/{id}',['middleware' => 'auth', 'uses' => 'BookingController@pay']);
Route::get('/client/view_payments',['middleware' => 'auth', 'uses' => 'BookingController@viewPayments']);
Route::get('/client/invoices',['middleware' => 'auth', 'uses' => 'BookingController@viewInvoices']);
//Admin's Booking routes
Route::match(['get', 'post'], '/admin/booking', 'BookingController@book');
Route::get('/admin/view_bookings', 'BookingController@viewBookings');
Route::match(['get', 'post'], '/admin/edit_booking/{id}', 'BookingController@editCategory');
Route::match(['get', 'post'], '/admin/delete_booking/{id}', 'BookingController@deleteCategory');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
