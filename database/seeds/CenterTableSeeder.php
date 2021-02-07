<?php

namespace Database\Seeders;

use App\Models\Center;
use App\Models\DiveActivity;
use App\Models\Staff;
use Faker\Factory;
use Illuminate\Database\Seeder;

class CenterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('ar_EG');

        Center::firstOrCreate(['email' => 'q5z@live.com'], [
            'name' => $faker->name,
            'type' => 'center',
            'premises' => 'standalone',
            'activity_id' => DiveActivity::all()->random()->first()->id,
            'mobile' => $faker->phoneNumber,
            'landline' => $faker->phoneNumber,
            'website' => $faker->url,
            'logo' => 'centers/1/hOJXLoICNpHwCwYRndUG26vlZicS0t1GKsMpKHyi.jpg',
            'stuff_members' => '1-4',
            'address_1' => $faker->address,
            'address_2' => $faker->address,
            'center_lat' => $faker->latitude,
            'center_lng' => $faker->longitude,
            'manager_name' => $faker->name,
            'manager_mobile' => $faker->phoneNumber,
            'owner_name' => $faker->name,
            'owner_mobile' => $faker->phoneNumber,
            'full_day' => 0,
            'amenities' => [
                "pool" => ["value" => $faker->numerify("###"), "enable" => "on"],
                "wifi" => ["value" => $faker->numerify("###"), "enable" => "on"],
                "near_beach" => ["value" => $faker->numerify("###"), "enable" => "on"],
                "restaurant" => ["enable" => "on"],
                "food_allowed" => ["enable" => "on"],
                "pets_allowed" => ["value" => $faker->numerify("###"), "enable" => "on"],
                "hotel_transport" => ["value" => $faker->numerify("###"), "enable" => "on"],
                "orientation_dive" => ["value" => $faker->numerify("###"), "enable" => "on"],
                "airport_transport" => ["value" => $faker->numerify("###"), "enable" => "on"],
                "air_con_classrooms" => ["enable" => "on"]
            ],
            'languages' => ["en", "ru"],
            'max_divers_per_trip' => $faker->numerify('##'),
            'max_divers_per_day' => $faker->numerify('##'),
            'max_day_divers' => $faker->numerify('##'),
            'max_night_dives' => $faker->numerify('##'),
            'max_em_dives' => $faker->numerify('##'),
            'mini_days_shore_dives' => $faker->numerify('##'),
            'mini_days_boat_dives' => $faker->numerify('##'),
            'max_days_shore_dives' => $faker->numerify('##'),
            'max_days_boat_dives' => $faker->numerify('##'),
            'mini_days_em_dives' => $faker->numerify('##'),
            'mini_days_night_dives' => $faker->numerify('##'),
            'max_days_em_dives' => $faker->numerify('##'),
            'max_days_night_dives' => $faker->numerify('##'),
            'bank_name' => $faker->name,
            'account_name' => $faker->name,
            'account_number' => $faker->bankAccountNumber,
            'enabled' => 1,
        ]);

        Center::factory()->count(100)->create();

        Staff::firstOrCreate(['email' => 'admin@admin.com'], [
            'name' => 'Test Staff',
            'mobile' => '+201091923922',
            'password' => '123123',
            'photo' => '',
            'gender' => 'u',
            'center_id' => Center::first()->id,
        ]);
    }
}
