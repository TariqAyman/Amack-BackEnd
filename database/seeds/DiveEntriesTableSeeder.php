<?php
namespace Database\Seeders;

use App\Models\DiveEntry;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiveEntriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dive_entries')->delete();
        $dive_entries = [
            ['id' => 1, 'name' => "Shore"],
            ['id' => 2, 'name' => "Boat"]
        ];
        DB::table('dive_entries')->insert($dive_entries);
    }
}
