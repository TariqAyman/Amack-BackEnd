<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(SchoolsTableSeeder::class);
        $this->call(TaxonsTableSeeder::class);
        $this->call(DayTimesTableSeeder::class);
        $this->call(DiveEntriesTableSeeder::class);
        $this->call(DiveActivitiesTableSeeder::class);
        $this->call(SeasonsTableSeeder::class);
        $this->call(DivingSitesTableSeeder::class);
        $this->call(AdminTableSeeder::class);
    }
}
