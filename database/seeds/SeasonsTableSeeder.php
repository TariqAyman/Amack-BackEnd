<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeasonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seasons = [['name' => 'Spring'], ['name' => 'Autumn'], ['name' => 'winter'], ['name' => 'summer']];
        DB::table('seasons')->insert($seasons);
    }
}
