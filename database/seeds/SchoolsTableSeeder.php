<?php


use App\Models\Course;
use App\Models\School;
use Illuminate\Database\Seeder;

class SchoolsTableSeeder extends Seeder
{
    public function run()
    {
        factory(School::class, 50)->create()->each(function ($school) {
            $school->courses()->createMany(
                factory(Course::class, 10)->make()->toArray()
            );
        });
    }
}
