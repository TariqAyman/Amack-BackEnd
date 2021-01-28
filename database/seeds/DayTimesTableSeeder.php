<?php
namespace Database\Seeders;

use App\Models\DayTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DayTimesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('day_times')->delete();
        $dayTimes = [
            ['id' => 1,'name'=>'Early Morning'],
            ['id' => 2,'name'=>'Day'],
            ['id' => 3,'name'=>'NIGHT'],
        ];
        DB::table('day_times')->insert($dayTimes);
    }
}
