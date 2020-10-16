<?php

use App\Models\City;
use App\Models\Course;
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
        DiveSite::create([
            'id' => '1',
            'name' => ' Shoe Stump',
            'description' => 'shore',
            'latitude' => '28.5288666666667',
            'longitude' => '34.5143833333333',
            'max_depth' => '30',
            'visibility' => 'High',
            'current' => 'mid',
            'city_id' => City::all()->random()->id,
            'license_id' => Course::all()->random()->id,
                'main_taxon_id' => Taxon::all()->random()->id,
            'enabled' => 1
        
        ]);

        DiveSite::create([
            'id' => '2',
            'name' => ' Umm Sid',
            'description' => 'shore',
            'latitude' => '28.4209166666667',
            'longitude' => '34.5143833333333',
            'max_depth' => '30',
            'visibility' => 'High',
            'current' => 'mid',
            'city_id' => City::all()->random()->id,
            'license_id' => Course::all()->random()->id,
                'main_taxon_id' => Taxon::all()->random()->id,
            'enabled' => 1
        ]);

        DiveSite::create([
            'id' => '3',
            'name' => ' Moray Garden',
            'description' => 'shore',
            'latitude' => '28.43755',
            'longitude' => '34.5143833333333',
            'max_depth' => '30',
            'visibility' => 'High',
            'current' => 'low',
            'city_id' => City::all()->random()->id,
            'license_id' => Course::all()->random()->id,
                'main_taxon_id' => Taxon::all()->random()->id,
            'enabled' => 1
        ]);

        DiveSite::create([
            'id' => '4',
            'name' => ' Rick`s Reef',
            'description' => 'shore',
            'latitude' => '28.5574333333333',
            'longitude' => '34.5143833333333',
            'max_depth' => '25',
            'visibility' => 'High',
            'current' => 'mid',
            'city_id' => City::all()->random()->id,
            'license_id' => Course::all()->random()->id,
                'main_taxon_id' => Taxon::all()->random()->id,
            'enabled' => 1
        ]);

        DiveSite::create([
            'id' => '5',
            'name' => ' Three Pools / South Oasis',
            'description' => 'shore',
            'latitude' => '28.43565',
            'longitude' => '34.5143833333333',
            'max_depth' => '20',
            'visibility' => 'High',
            'current' => 'mid',
            'city_id' => City::all()->random()->id,
            'license_id' => Course::all()->random()->id,
                'main_taxon_id' => Taxon::all()->random()->id,
            'enabled' => 1
        ]);

        DiveSite::create([
            'id' => '6',
            'name' => 'South Ras Abu Galum',
            'description' => 'boat',
            'latitude' => '28.607',
            'longitude' => '34.5143833333333',
            'max_depth' => '30',
            'visibility' => 'High',
            'current' => 'mid',
            'city_id' => City::all()->random()->id,
            'license_id' => Course::all()->random()->id,
                'main_taxon_id' => Taxon::all()->random()->id,
            'enabled' => 1
        ]);

        DiveSite::create([
            'id' => '7',
            'name' => ' North Ras Abu Galum',
            'description' => 'boat',
            'latitude' => '28.6091666666667',
            'longitude' => '34.5143833333333',
            'max_depth' => '30',
            'visibility' => 'High',
            'current' => 'mid',
            'city_id' => City::all()->random()->id,
            'license_id' => Course::all()->random()->id,
                'main_taxon_id' => Taxon::all()->random()->id,
            'enabled' => 1
        ]);

        DiveSite::create([
            'id' => '8',
            'name' => ' Ras Abu Galum',
            'description' => 'boat',
            'latitude' => '28.6129666666667',
            'longitude' => '34.5143833333333',
            'max_depth' => '30',
            'visibility' => 'High',
            'current' => 'mid',
            'city_id' => City::all()->random()->id,
            'license_id' => Course::all()->random()->id,
                'main_taxon_id' => Taxon::all()->random()->id,
            'enabled' => 1
        ]);

        DiveSite::create([
            'id' => '9',
            'name' => ' Red Tooth Trigger Bay',
            'description' => 'shore',
            'latitude' => '28.6198833333333',
            'longitude' => '34.5143833333333',
            'max_depth' => '30',
            'visibility' => 'High',
            'current' => 'mid',
            'city_id' => City::all()->random()->id,
            'license_id' => Course::all()->random()->id,
                'main_taxon_id' => Taxon::all()->random()->id,
            'enabled' => 1
        ]);

        DiveSite::create([
            'id' => '10',
            'name' => ' Lighthouse',
            'description' => 'shore',
            'latitude' => '28.4990666666667',
            'longitude' => '34.5143833333333',
            'max_depth' => '35',
            'visibility' => 'High',
            'current' => 'low',
            'city_id' => City::all()->random()->id,
            'license_id' => Course::all()->random()->id,
                'main_taxon_id' => Taxon::all()->random()->id,
            'enabled' => 1
        ]);

        DiveSite::create([
            'id' => '11',
            'name' => ' Mashraba',
            'description' => 'shore',
            'latitude' => '28.4952',
            'longitude' => '34.5143833333333',
            'max_depth' => '30',
            'visibility' => 'High',
            'current' => 'low',
            'city_id' => City::all()->random()->id,
            'license_id' => Course::all()->random()->id,
                'main_taxon_id' => Taxon::all()->random()->id,
            'enabled' => 1
        ]);

        DiveSite::create([
            'id' => '12',
            'name' => ' Lionfish Rock',
            'description' => 'shore',
            'latitude' => '28.4508333333333',
            'longitude' => '34.5143833333333',
            'max_depth' => '30',
            'visibility' => 'High',
            'current' => 'mid',
            'city_id' => City::all()->random()->id,
            'license_id' => Course::all()->random()->id,
                'main_taxon_id' => Taxon::all()->random()->id,
            'enabled' => 1
        ]);

        DiveSite::create([
            'id' => '13',
            'name' => ' The Islands / Seven Pinnacles',
            'description' => 'shore',
            'latitude' => '28.4772',
            'longitude' => '34.5143833333333',
            'max_depth' => '20',
            'visibility' => 'High',
            'current' => 'mid',
            'city_id' => City::all()->random()->id,
            'license_id' => Course::all()->random()->id,
                'main_taxon_id' => Taxon::all()->random()->id,
            'enabled' => 1
        ]);


        DiveSite::create([
            'id' => '14',
            'name' => ' Golden Blocks',
            'description' => 'shore',
            'latitude' => '28.4390333333333',
            'longitude' => '34.5143833333333',
            'max_depth' => '30',
            'visibility' => 'High',
            'city_id' => City::all()->random()->id,
            'license_id' => Course::all()->random()->id,
                'main_taxon_id' => Taxon::all()->random()->id,
            'enabled' => 1
        ]);


        DiveSite::create([
            'id' => '15',
            'name' => ' Eel Garden',
            'description' => 'shore',
            'latitude' => '28.505',
            'longitude' => '34.5143833333333',
            'max_depth' => '30',
            'visibility' => 'High',
            'current' => 'low',
            'city_id' => City::all()->random()->id,
            'license_id' => Course::all()->random()->id,
                'main_taxon_id' => Taxon::all()->random()->id,
            'enabled' => 1
        ]);
        DiveSite::create([
            'id' => '16',
            'name' => ' El Shugarat',
            'description' => 'shore',
            'latitude' => '28.3559833333333',
            'longitude' => '34.5143833333333',
            'max_depth' => '30',
            'visibility' => 'High',
            'current' => 'low',
            'city_id' => City::all()->random()->id,
            'license_id' => Course::all()->random()->id,
                'main_taxon_id' => Taxon::all()->random()->id,
            'enabled' => 1
        ]);

        DiveSite::create([
            'id' => '17',
            'name' => ' Coral Garden',
            'description' => 'shore',
            'latitude' => '28.5549',
            'longitude' => '34.5143833333333',
            'max_depth' => '30',
            'visibility' => 'High',
            'current' => 'low',
            'city_id' => City::all()->random()->id,
            'license_id' => Course::all()->random()->id,
                'main_taxon_id' => Taxon::all()->random()->id,
            'enabled' => 1
        ]);
        DiveSite::create([
            'id' => '18',
            'name' => ' Gabr el Bint',
            'description' => 'shore',
            'latitude' => '28.3535166666667',
            'longitude' => '34.5143833333333',
            'max_depth' => '30',
            'visibility' => 'High',
            'current' => 'mid',
            'city_id' => City::all()->random()->id,
            'license_id' => Course::all()->random()->id,
                'main_taxon_id' => Taxon::all()->random()->id,
            'enabled' => 1
        ]);

        DiveSite::create([
            'id' => '19',
            'name' => ' The Canyon / the Fish Bowl',
            'description' => 'shore',
            'latitude' => '28.5549',
            'longitude' => '34.5143833333333',
            'max_depth' => '100',
            'visibility' => 'High',
            'current' => 'mid',
            'city_id' => City::all()->random()->id,
            'license_id' => Course::all()->random()->id,
                'main_taxon_id' => Taxon::all()->random()->id,
            'enabled' => 1
        ]);

        DiveSite::create([
            'id' => '20',
            'name' => ' Bannerfish Bay',
            'description' => 'shore',
            'latitude' => '28.4989',
            'longitude' => '34.5143833333333',
            'max_depth' => '30',
            'visibility' => 'High',
            'current' => 'low',
            'city_id' => City::all()->random()->id,
            'license_id' => Course::all()->random()->id,
                'main_taxon_id' => Taxon::all()->random()->id,
            'enabled' => 1
        ]);

        DiveSite::create([
            'id' => '21',
            'name' => ' Abu Helal / Abu Talha',
            'description' => 'shore',
            'latitude' => '28.5423833333333',
            'longitude' => '34.5143833333333',
            'max_depth' => '60',
            'visibility' => 'High',
            'current' => 'mid',
            'city_id' => City::all()->random()->id,
            'license_id' => Course::all()->random()->id,
                'main_taxon_id' => Taxon::all()->random()->id,
            'enabled' => 1
        ]);

        DiveSite::create([
            'id' => '22',
            'name' => ' The Caves',
            'description' => 'shore',
            'latitude' => '28.4166833333333',
            'longitude' => '34.5143833333333',
            'max_depth' => '35',
            'visibility' => 'High',
            'current' => 'low',
            'city_id' => City::all()->random()->id,
            'license_id' => Course::all()->random()->id,
                'main_taxon_id' => Taxon::all()->random()->id,
            'enabled' => 1
        ]);

        DiveSite::create([
            'id' => '23',
            'name' => ' The Blue Hole / the Bells',
            'description' => 'shore',
            'latitude' => '28.5727833333333',
            'longitude' => '34.5143833333333',
            'max_depth' => '200',
            'visibility' => 'High',
            'current' => 'low',
            'city_id' => City::all()->random()->id,
            'license_id' => Course::all()->random()->id,
                'main_taxon_id' => Taxon::all()->random()->id,
            'enabled' => 1
        ]);



        // factory(DiveSite::class, 50)->create()->each(function (DiveSite $site) {
        //     $site->subTaxons()->attach([
        //         Taxon::all()->random()->id => ['position' => 0],
        //         Taxon::all()->random()->id => ['position' => 1],
        //     ]);
        //     $site->dayTimes()->attach([DayTime::all()->random()->id, DayTime::all()->random()->id]);
        //     $site->activities()->attach([DiveActivity::all()->random()->id, DiveActivity::all()->random()->id]);
        //     $site->seasons()->attach([Season::all()->random()->id, Season::all()->random()->id]);
        // });
    }
}
