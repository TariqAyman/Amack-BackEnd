<?php


use Illuminate\Database\Seeder;
use App\Models\DivingSite;

class DivingSitesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(DivingSite::class, 50)->create();

    }
}
