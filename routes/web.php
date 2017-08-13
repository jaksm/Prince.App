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
    return view('welcome');
});

Route::get('/home/calendar', function () {
    return view('user.calendar');
});

Route::get('/home/flight/create/autocomplete',array('as'=>'autocomplete','uses'=>'FlightController@autocomplete'));
Route::get('/home/flight/create/posada',array('as'=>'posada','uses'=>'FlightController@posada'));


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');

Route::get('admin/users', 'AdminController@allUsers')->name('admin.users');
Route::resource('admin/user', 'AdminController');

Route::prefix('admin')->group(function() {
  Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
  Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
  Route::get('/', 'AdminController@index')->name('admin.dashboard');
  Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
});

// Avioni
Route::resource('home/airplane', 'AirplaneController');

// Klienti
Route::resource('home/client', 'ClientController');

// Posada
Route::resource('home/staff', 'StaffController');

// Let
Route::resource('home/flight', 'FlightController');

// Export
Route::resource('home/export', 'LetExportController');
