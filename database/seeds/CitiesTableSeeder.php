<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->delete();
        $cities = [
            ['name' => "Cairo", 'country_id' => 64,'latitude'=>30.044420,'longitude'=>31.235712,'temp'=>'20','wind'=>'150','rate'=>3.4],
            ['name' => "Dahab", 'country_id' => 64,'latitude'=>28.488930,'longitude'=>34.501560,'temp'=>'20','wind'=>'150','rate'=>3.4],
            ['name' => "Nuweiba", 'country_id' => 64,'latitude'=>28.980801,'longitude'=>34.659721,'temp'=>'20','wind'=>'150','rate'=>3.4]
        ];
        DB::table('cities')->insert($cities);
    }
}
