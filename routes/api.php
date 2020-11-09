<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/login', 'Auth\AuthController@login');
Route::get('/social/login', 'Auth\SocialLoginController@redirectToProvider');
Route::get('/social/callback', 'Auth\SocialLoginController@handleProviderCallback')->name('social.callback');
Route::post('/social/auth', 'Auth\SocialLoginController@auth')->name('social.auth');
Route::post('/register', 'Auth\UsersController@register');


Route::middleware(['auth:api', \App\Http\Middleware\IdentifierMiddleware::class])->group(function () {
    Route::post('/logout', 'Auth\AuthController@logout');
    Route::patch('/me/change-password', 'Auth\UsersController@changePassword');
    Route::get('/me', 'Auth\UsersController@me');
    Route::patch('/me/change-avatar', 'Auth\UsersController@changeAvatar');

    Route::post('user-licenses/create', 'UserLicensesController@create');
    Route::delete('user-licenses/{id}', 'UserLicensesController@delete');
    Route::patch('user-licenses/{id}/default', 'UserLicensesController@setDefault');

    Route::get('/countries', 'CountriesController@listCountries');
    Route::get('/schools', 'SchoolsController@listSchools');

    Route::get('/taxons', 'TaxonsController@index');
    Route::get('/seasons', 'SeasonsController@index');
    Route::get('/day-times', 'DayTimesController@index');
    Route::get('/dive-activities', 'DiveActivitiesController@index');

    Route::post('/sites/search', 'DiveSitesController@index');
    Route::get('/sites/autocomplete', 'DiveSitesController@autoComplete');
    Route::get('/sites/{siteId}', 'DiveSitesController@show');

    Route::get('filters','FilterController@index');
});
