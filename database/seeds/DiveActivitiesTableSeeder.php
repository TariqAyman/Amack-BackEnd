<?php

use App\Models\DiveActivity;
use Illuminate\Database\Seeder;

class DiveActivitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(DiveActivity::class, 5)->create();

    }
}
