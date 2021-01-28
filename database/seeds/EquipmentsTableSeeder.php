<?php
namespace Database\Seeders;

use App\Models\Season;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EquipmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('equipments')->delete();
        $equipments = [
            ['id' => 1, 'name' => "Weight Belt", 'night_dive' => 0, 'nitrox' => 0, 'state' => 'main', 'season_id' => Season::all()->random()->id,],
            ['id' => 2, 'name' => "Boots", 'night_dive' => 0, 'nitrox' => 0, 'state' => 'main', 'season_id' => Season::all()->random()->id,],
            ['id' => 3, 'name' => "Suit", 'night_dive' => 0, 'nitrox' => 0, 'state' => 'main', 'season_id' => Season::all()->random()->id,],
            ['id' => 4, 'name' => "BCD", 'night_dive' => 0, 'nitrox' => 0, 'state' => 'main', 'season_id' => Season::all()->random()->id,],
            ['id' => 5, 'name' => "Fins", 'night_dive' => 0, 'nitrox' => 0, 'state' => 'main', 'season_id' => Season::all()->random()->id,],
            ['id' => 6, 'name' => "Mask", 'night_dive' => 0, 'nitrox' => 0, 'state' => 'main', 'season_id' => Season::all()->random()->id,],
        ];
        DB::table('equipments')->insert($equipments);
    }
}
