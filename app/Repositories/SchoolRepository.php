<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Models\School;
use Illuminate\Database\Eloquent\Collection;


class SchoolRepository
{

    public function findAll(): ?Collection
    {
        return School::with('courses:id,name,school_id')->get();
    }
}
