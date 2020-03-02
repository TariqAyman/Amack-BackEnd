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

Route::post('/logout', 'Api\Auth\AuthController@logout')->middleware('auth:api');
Route::post('/register', 'Api\Auth\UsersController@register');
Route::get('/countries', 'Api\CountriesController@listCountries');
