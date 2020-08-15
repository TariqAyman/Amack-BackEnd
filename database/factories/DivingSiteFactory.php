<?php

/** @var Factory $factory */

use App\Models\City;
use App\Models\Course;
use App\Models\DiveEntry;
use App\Models\DiveSite;
use App\Models\Taxon;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

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

$factory->define(DiveSite::class, function (Faker $faker) {
    return [
        'name' => $faker->firstName,
        'city_id' => City::all()->random()->id,
        'license_id' => Course::all()->random()->id,
        'main_taxon_id' => Taxon::all()->random()->id,
        'description' => $faker->text,
        'longitude' => $faker->longitude,
        'latitude' => $faker->latitude,
        'max_depth' => $faker->numberBetween(),
        'current' => 'low',
        'visibility' => 'high',
        'enabled' => 1
    ];
});
