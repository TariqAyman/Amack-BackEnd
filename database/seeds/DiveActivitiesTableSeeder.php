<?php
namespace Database\Seeders;

use App\Models\DiveActivity;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiveActivitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dive_activities')->delete();
        $dive_activities = [
            ['id' => 1,'name' => "SCUBA Diving", 'description'=>'adasdeqad'],
            ['id' => 2,'name' => "Free-Diving", 'description'=>'adasdeqad']
        ];
        DB::table('dive_activities')->insert($dive_activities);
    }
}
