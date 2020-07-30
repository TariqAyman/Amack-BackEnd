<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Course;

class CourseRepository extends Repository
{

    public function getModel()
    {
        return Course::class;
    }

    public function getDatatable()
    {
        // TODO: Implement getDatatable() method.
    }
}
