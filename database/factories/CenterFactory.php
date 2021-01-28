<?php

namespace Database\Factories;

use App\Models\Center;
use App\Models\DiveActivity;
use Illuminate\Database\Eloquent\Factories\Factory;

class CenterFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Center::class;

    /**
     * Define the model's default state.
     *
     * @return array
     * @throws \Exception
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'type' => $this->faker->randomElement(['center', 'center_shop', 'shop']),
            'premises' => $this->faker->randomElement(['standalone', 'inside_hotel']),
            'activity_id' => DiveActivity::all()->random()->first()->id,
            'mobile' => $this->faker->phoneNumber,
            'landline' => $this->faker->phoneNumber,
            'email' => $this->faker->email,
            'website' => $this->faker->url,
            'logo' => 'centers/1/hOJXLoICNpHwCwYRndUG26vlZicS0t1GKsMpKHyi.jpg',
            'stuff_members' => $this->faker->randomElement(['1-4', '5-9', '10+']),
            'address_1' => $this->faker->address,
            'address_2' => $this->faker->address,
            'center_lat' => $this->faker->latitude,
            'center_lng' => $this->faker->longitude,
            'manager_name' => $this->faker->name,
            'manager_mobile' => $this->faker->phoneNumber,
            'owner_name' => $this->faker->name,
            'owner_mobile' => $this->faker->phoneNumber,
            'full_day' => rand(0, 1),
            'amenities' => '{\"pool\": {\"value\": null, \"enable\": \"on\"}, \"wifi\": {\"value\": null}, \"near_beach\": {\"value\": null}, \"pets_allowed\": {\"value\": null}, \"hotel_transport\": {\"value\": null}, \"orientation_dive\": {\"value\": null}, \"airport_transport\": {\"value\": null}}',
            'languages' => '[\"en\", \"ru\"]',
            'max_divers_per_trip' => random_int(1, 1000),
            'max_divers_per_day' => random_int(1, 1000),
            'max_day_divers' => random_int(1, 1000),
            'max_night_dives' => random_int(1, 1000),
            'max_em_dives' => random_int(1, 1000),
            'mini_days_shore_dives' => random_int(1, 1000),
            'mini_days_boat_dives' => random_int(1, 1000),
            'max_days_shore_dives' => random_int(1, 1000),
            'max_days_boat_dives' => random_int(1, 1000),
            'mini_days_em_dives' => random_int(1, 1000),
            'mini_days_night_dives' => random_int(1, 1000),
            'max_days_em_dives' => random_int(1, 1000),
            'max_days_night_dives' => random_int(1, 1000),
            'bank_name' => $this->faker->name,
            'account_name' => $this->faker->name,
            'account_number' => $this->faker->bankAccountNumber,
            'enabled' => random_int(0, 1),
        ];
    }
}
