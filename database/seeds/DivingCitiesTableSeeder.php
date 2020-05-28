<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DivingCitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $divingCities = [
            ['city_id' => 1059, 'longitude' => 29.3102, 'latitude' => 34.1532],
        ];
        DB::table('dive_cities')->insert($divingCities);


    }
}
