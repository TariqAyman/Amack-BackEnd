<?php

use App\Models\DayTime;
use Illuminate\Database\Seeder;

class DayTimesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(DayTime::class, 5)->create();
    }
}
