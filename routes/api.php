<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', 'Api\Auth\AuthController@login');
Route::get('/social/login', 'Api\Auth\SocialLoginController@redirectToProvider');
Route::get('/social/callback', 'Api\Auth\SocialLoginController@handleProviderCallback')->name('social.callback');
Route::post('/social/auth', 'Api\Auth\SocialLoginController@auth')->name('social.auth');

Route::post('/logout', 'Api\Auth\AuthController@logout')->middleware('auth:api');
Route::patch('/me/change-password', 'Api\Auth\UsersController@changePassword')->middleware('auth:api');
Route::get('/me', 'Api\Auth\UsersController@me')->middleware('auth:api');
Route::patch('/me/change-avatar', 'Api\Auth\UsersController@changeAvatar')->middleware('auth:api');

Route::post('user-licenses/create', 'Api\UserLicensesController@create')->middleware('auth:api');
Route::delete('user-licenses/{id}', 'Api\UserLicensesController@delete')->middleware('auth:api');
Route::patch('user-licenses/{id}/default', 'Api\UserLicensesController@setDefault')->middleware('auth:api');


Route::post('/register', 'Api\Auth\UsersController@register');
Route::get('/countries', 'Api\CountriesController@listCountries');
Route::get('/schools', 'Api\SchoolsController@listSchools');

Route::get('/sites', 'Api\DiveSitesController@index');
