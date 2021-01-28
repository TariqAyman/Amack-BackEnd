<?php

use App\Models\Center;
use App\Models\Staff;
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
        $center = Center::create([
            'name' => 'Test center',
            'type' => 'center',
            'premises' => 'standalone',
            'activities' => '1',
            'mobile' => '01003003200',
            'landline' => '123',
            'email' => 'q5z@live.com',
            'website' => 'https://www.facebook.com/',
            'logo' => 'centers/1/hOJXLoICNpHwCwYRndUG26vlZicS0t1GKsMpKHyi.jpg',
            'stuff_members' => '1-4',
            'address_1' => '6 october',
            'address_2' => 'dfdsfds',
            'center_lat' => '123',
            'center_lng' => '321',
            'manager_name' => 'dqwd',
            'manager_mobile' => '+201091923922',
            'owner_name' => 'dqwd',
            'owner_mobile' => '+201091923922',
            'full_day' => 0,
            'amenities' => '{\"pool\": {\"value\": null, \"enable\": \"on\"}, \"wifi\": {\"value\": null}, \"near_beach\": {\"value\": null}, \"pets_allowed\": {\"value\": null}, \"hotel_transport\": {\"value\": null}, \"orientation_dive\": {\"value\": null}, \"airport_transport\": {\"value\": null}}',
            'languages' => '[\"en\", \"ru\"]',
            'max_divers_per_trip' => 1,
            'max_divers_per_day' => 2,
            'max_day_divers' => 2,
            'max_night_dives' => 2,
            'max_em_dives' => NULL,
            'mini_days_shore_dives' => 2,
            'mini_days_boat_dives' => 2,
            'max_days_shore_dives' => 2,
            'max_days_boat_dives' => 2,
            'mini_days_em_dives' => 2,
            'mini_days_night_dives' => 2,
            'max_days_em_dives' => 2,
            'max_days_night_dives' => 2,
            'bank_name' => 'fwefewfe12222222222',
            'account_name' => 'fwefewf',
            'account_number' => 'ث12ث12ثث',
            'enabled' => 1,
        ]);

        Staff::create([
            'name' => 'Test Staff',
            'email' => 'admin@admin.com',
            'mobile' => '+201091923922',
            'password' => '123123',
            'photo' => '',
            'gender' => 'u',
            'center_id' => $center->id,
        ]);
    }
}
