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

Auth::routes();

Route::get('/home', 'HomeController@index');

/**
 * Admin Auth Routes
 */
Route::group(['prefix' => 'admin'], function(){
	Route::get('/home', function(){

		return view('admin.home');

	})->middleware('admin');
	Route::get('/login', 'AdminAuth\LoginController@showLoginForm')->name('admin.login');
	Route::post('/login', 'AdminAuth\LoginController@login')->name('admin.login');
	Route::post('/logout', 'AdminAuth\LoginController@logout')->name('admin.logout');
	Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm');
	Route::post('/register', 'AdminAuth\RegisterController@register')->name('admin.register');
});

/**
 * Admin Accesible Routes
 */

Route::group(['middleware' => 'admin'],function(){
	Route::get('/register-donor', 'DonorController@showRegisterDonorForm');
	Route::post('/register-donor', 'DonorController@registerDonor');
	Route::get('/register-donation', 'BloodController@showBloodGroupList');
	Route::post('/register-donation/{donor_id}', 'BloodController@registerDonation');
	Route::get('blood-requests', 'BloodController@showRequests');
	Route::get('approve-request/{request_id}', 'RequestController@approveRequest');
	Route::get('view-requests/blood-group/{blood_group_id}', 'RequestController@filterRequests');
});

/**
 * Public Routes
 */

Route::get('/blood-group/{blood_group_id}', 'BloodController@showDonorList');
Route::get('/view-donor/{donor_id}', 'BloodController@showDonor');
Route::get('/view-donors', 'DonorController@getAllDonors');
Route::get('/view-donors/blood-group/{blood_group_id}', 'DonorController@filterDonors');
Route::get('/stock', 'StockController@showStock');
Route::get('/stock/{blood_group_id}', 'StockController@filterStock');

/**
 * User Auth Routes
 */

Route::group(['middleware' => 'auth'], function(){
	Route::get('/request-blood', 'RequestController@showRequestForm');
	Route::post('/request-blood', 'RequestController@registerRequest');
});