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
    return view('soon');
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
        Route::delete('cities/{id}/remove-image/{imageId}', 'CitiesController@removeImage')->name('cities.remove-image');

        Route::post('taxons/data', 'TaxonsController@data')->name('taxons.data');
        Route::resource('taxons', 'TaxonsController');
        Route::delete('taxons/{id}/remove-photo', 'TaxonsController@removePhoto')->name('taxons.remove-photo');

        Route::post('dive-entries/data', 'DiveEntriesController@data')->name('dive-entries.data');
        Route::resource('dive-entries', 'DiveEntriesController');
        Route::delete('dive-entries/{id}/remove-photo', 'DiveEntriesController@removePhoto')->name('dive-entries.remove-photo');

        Route::post('dive-activities/data', 'DiveActivitiesController@data')->name('dive-activities.data');
        Route::resource('dive-activities', 'DiveActivitiesController');
        Route::delete('dive-activities/{id}/remove-photo', 'DiveActivitiesController@removePhoto')->name('dive-activities.remove-photo');

        Route::post('dive-sites/data', 'DiveSitesController@data')->name('dive-sites.data');
        Route::resource('dive-sites', 'DiveSitesController');
        Route::delete('dive-sites/{id}/remove-image/{imageId}', 'DiveSitesController@removeImage')->name('dive-sites.remove-image');

        Route::post('seasons/data', 'SeasonsController@data')->name('seasons.data');
        Route::resource('seasons', 'SeasonsController');
        Route::delete('seasons/{id}/remove-photo', 'SeasonsController@removePhoto')->name('seasons.remove-photo');

        Route::post('day-times/data', 'DayTimesController@data')->name('day-times.data');
        Route::resource('day-times', 'DayTimesController');
        Route::delete('day-times/{id}/remove-photo', 'DayTimesController@removePhoto')->name('day-times.remove-photo');

        Route::post('users/data', 'UsersController@data')->name('users.data');
        Route::resource('users', 'UsersController');

        Route::post('schools/data', 'SchoolsController@data')->name('schools.data');
        Route::resource('schools', 'SchoolsController');
        Route::delete('schools/{id}/remove-logo', 'SchoolsController@removeLogo')->name('schools.remove-logo');

        Route::post('courses/data', 'CoursesController@data')->name('courses.data');
        Route::resource('courses', 'CoursesController');

        Route::post('equipments/data', 'EquipmentsController@data')->name('equipments.data');
        Route::resource('equipments', 'EquipmentsController');
        Route::delete('equipments/{id}/remove-photo', 'EquipmentsController@removePhoto')->name('equipments.remove-photo');

        Route::post('centers/data', 'CentersController@data')->name('centers.data');
        Route::resource('centers', 'CentersController');
        Route::delete('centers/{id}/remove-logo', 'CentersController@removeLogo')->name('centers.remove-logo');

        Route::post('staff/data', 'StaffController@data')->name('staff.data');
        Route::resource('staff', 'StaffController');

    });
});
