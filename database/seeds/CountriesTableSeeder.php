<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->delete();
        $countries = [
            ['id' => 64,'code' => 'EG','name' => "Egypt",'phone_code' => 20],
        ];
        DB::table('countries')->insert($countries);
    }
}
