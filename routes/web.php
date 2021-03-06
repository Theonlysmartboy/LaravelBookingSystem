<?php

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
Route::match(['get', 'post'], '/admin/update_profile', 'AdminController@updateProfile');
//Admin booking routes
Route::get('/admin/bookings', 'BookingController@viewAllBookings');
Route::match(['get', 'post'], '/admin/accept_booking/{id}', 'BookingController@acceptBooking');
Route::match(['get', 'post'], '/admin/reject_booking/{id}', 'BookingController@rejectBooking');
Route::match(['get', 'post'], '/admin/delete_booking/{id}', 'BookingController@deleteBooking');
Route::get('/admin/invoices', 'InvoicesController@viewInvoices');
//Admin Accounts routes
Route::get('/admin/accounts', 'SettingsController@viewAccounts');
Route::match(['get', 'post'], '/admin/add_bank_details', 'SettingsController@addAccount');
Route::match(['get', 'post'], '/admin/edit_bank_details/{id}', 'SettingsController@editAccount');
Route::match(['get', 'post'], '/admin/delete_bank_details/{id}', 'SettingsController@deleteAccount');
Route::match(['get', 'post'], '/admin/enable/{id}', 'SettingsController@enable');
Route::match(['get', 'post'], '/admin/disable/{id}', 'SettingsController@disable');
//Admin Charges routes
Route::get('/admin/payments', 'SettingsController@viewPayments');
Route::match(['get', 'post'], '/admin/add_payment', 'SettingsController@addPayment');
Route::match(['get', 'post'], '/admin/edit_payment/{id}', 'SettingsController@editPayment');
Route::match(['get', 'post'], '/admin/delete_payment/{id}', 'SettingsController@deletePayment');
//Admin Client routes
Route::get('/admin/clients', 'ClientController@viewClients');
Route::match(['get', 'post'], '/admin/delete_client/{id}', 'ClientController@deleteClient');
//Company settings route
Route::match(['get', 'post'], '/admin/company_settings', 'SettingsController@company');
//Admin Services routes
Route::get('/admin/view_services', 'ServicesController@viewServices');
Route::match(['get', 'post'], '/admin/add_service', 'ServicesController@addService');
Route::match(['get', 'post'], '/admin/edit_service/{id}', 'ServicesController@editService');
Route::match(['get', 'post'], '/admin/delete_service/{id}', 'ServicesController@deleteService');
//Client's Logout route
Route::get('client/logout', 'BookingController@logout');
Route::match(['get', 'post'], '/client/update_profile', ['middleware' => 'auth', 'uses' => 'SettingsController@updateProfile']);
//Client's Booking routes
Route::match(['get', 'post'], '/client/add_booking', ['middleware' => 'auth', 'uses' => 'BookingController@book']);
Route::get('/client/view_bookings', ['middleware' => 'auth', 'uses' => 'BookingController@viewBookings']);
Route::match(['get', 'post'], '/client/edit_booking/{id}', ['middleware' => 'auth', 'uses' => 'BookingController@editCategory']);
Route::match(['get', 'post'], '/client/delete_booking/{id}', ['middleware' => 'auth', 'uses' => 'BookingController@deleteCategory']);
//Client's payment routes
Route::match(['get', 'post'], '/client/make_payment/{id}', ['middleware' => 'auth', 'uses' => 'BookingController@pay']);
Route::get('/client/view_payments', ['middleware' => 'auth', 'uses' => 'BookingController@viewPayments']);
Route::get('/client/invoices', ['middleware' => 'auth', 'uses' => 'BookingController@viewInvoices']);
Auth::routes();
Route::get('pdfview', array('as' => 'pdfview', 'uses' => 'BookingController@pdfview'));
Route::get('/home', 'HomeController@index')->name('home');
