<?php

/** @var Factory $factory */

use App\Models\School;
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

$factory->define(School::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'logo' => $faker->imageUrl()
    ];
});
