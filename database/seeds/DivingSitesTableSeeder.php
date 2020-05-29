<?php


use App\Models\DayTime;
use App\Models\DiveActivity;
use App\Models\Season;
use App\Models\Taxon;
use Illuminate\Database\Seeder;
use App\Models\DiveSite;

class DivingSitesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(DiveSite::class, 50)->create()->each(function (DiveSite $site) {
            $site->subTaxons()->attach([
                Taxon::all()->random()->id => ['position' => 0],
                Taxon::all()->random()->id => ['position' => 1],
            ]);
            $site->dayTimes()->attach([DayTime::all()->random()->id, DayTime::all()->random()->id]);
            $site->activities()->attach([DiveActivity::all()->random()->id, DiveActivity::all()->random()->id]);
            $site->seasons()->attach([Season::all()->random()->id, Season::all()->random()->id]);
        });
    }
}
