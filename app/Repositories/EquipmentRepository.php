<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Equipment;
use Illuminate\Database\Eloquent\Collection;

class EquipmentRepository extends Repository
{
    public function getModel()
    {
        return Equipment::class;
    }

    public function getDatatable()
    {
        // TODO: Implement getDatatable() method.
    }
}
