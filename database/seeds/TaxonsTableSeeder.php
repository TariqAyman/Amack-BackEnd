<?php

use App\Models\Taxon;
use Illuminate\Database\Seeder;

class TaxonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Taxon::class, 50)->create();
    }
}
