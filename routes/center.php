<?php
/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 12/2/20, 3:42 AM
 * Last Modified: 12/2/20, 3:42 AM
 * Project Name: Amack-BackEnd
 * File Name: center.php
 */

// Auth routes
Route::get('/', 'Auth\AuthController@showLoginForm');
Route::get('login', 'Auth\AuthController@showLoginForm')->name('center.login');
Route::post('login', 'Auth\AuthController@login')->name('center.login.post');
Route::get('/forgot-password', 'Auth\AuthController@showLoginForm')->name('center.forgot-password');

Route::name('center.')->middleware('auth:staff')->group(function () {
    // Auth routes
    Route::get('logout', 'Auth\AuthController@logout')->name('center.logout');

    Route::get('/', 'DashboardController@index')->name('dashboard');

    Route::get('/info', 'CenterController@index')->name('info');
    Route::post('/info', 'CenterController@store')->name('info.post');

    Route::view('promotions', 'center.promotions')->name('promotions');
    Route::view('statistics', 'center.statistics')->name('statistics');

    Route::get('dashboard', 'DashboardController@index')->name('dashboard');

    Route::resource('site','SitesController')->only(['show','update']);

    Route::get('getCitiesAJAX','CenterController@getCitiesAJAX')->name('getCitiesAJAX');

    Route::post('updateSites','CenterController@updateSites')->name('updateSites');

});
