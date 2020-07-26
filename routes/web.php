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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin/')->namespace('Admin')->group(function () {
    Route::get('login', 'AuthController@showLoginForm');
    Route::post('login', 'AuthController@login')->name('login');

    Route::middleware('auth')->group(function () {
        Route::get('logout', 'AuthController@logout')->name('logout');
        Route::get('', 'DashboardController@index')->name('dashboard');

        Route::post('admins/data', 'AdminsController@data')->name('admins.data');
        Route::resource('admins', 'AdminsController');

        Route::post('countries/data', 'CountriesController@data')->name('countries.data');
        Route::resource('countries', 'CountriesController');

        Route::post('cities/data', 'CitiesController@data')->name('cities.data');
        Route::resource('cities', 'CitiesController');

    });
});
