<?php
namespace Database\Seeders;

use App\Models\Taxon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaxonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('taxons')->delete();
        $taxons = [
            ['id' => 1,'name' => "wreck", 'description'=>'adasdeqad'],
            ['id' => 2,'name' => "Sandy Bottom", 'description'=>'adasdeqad'],
            ['id' => 3,'name' => "Altitude", 'description'=>'adasdeqad'],
            ['id' => 4,'name' => "Cave", 'description'=>'adasdeqad'],
            ['id' => 5,'name' => "marine life", 'description'=>'adasdeqad'],
            ['id' => 6,'name' => "Reef", 'description'=>'adasdeqad'],
            ['id' => 7,'name' => "artificial", 'description'=>'adasdeqad'],
            ['id' => 8,'name' => "shark", 'description'=>'adasdeqad'],
            ['id' => 9,'name' => "whale", 'description'=>'adasdeqad'],
            ['id' => 10,'name' => "Dolphin", 'description'=>'adasdeqad'],
            ['id' => 11,'name' => "Dugong", 'description'=>'adasdeqad'],

        ];
        DB::table('taxons')->insert($taxons);
    }
}
