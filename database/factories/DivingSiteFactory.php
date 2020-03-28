<?php

/** @var Factory $factory */

use App\Models\City;
use App\Models\Country;
use App\Models\DivingSite;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(DivingSite::class, function (Faker $faker) {
    return [
        'position' => DB::raw('POINT(' . $faker->latitude . ',' . $faker->longitude . ')'),
        'country_id' => Country::all()->random()->id,
        'city_id' => City::all()->random()->id,
        'dive_type' => 'zodiac',
        'enabled' => $faker->boolean()
    ];
});
