<?php

use App\Models\DiveEntry;
use Illuminate\Database\Seeder;

class DiveEntriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(DiveEntry::class, 5)->create();

    }
}
