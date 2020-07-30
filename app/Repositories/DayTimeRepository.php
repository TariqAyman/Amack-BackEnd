<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\DayTime;
use Yajra\DataTables\Facades\DataTables;

class DayTimeRepository extends Repository
{

    public function getModel()
    {
        return DayTime::class;
    }

    public function getDatatable()
    {
        $data = DayTime::query()->select(['id', 'name']);
        return Datatables::of($data)
            ->addColumn('options', function (DayTime $dayTime) {
                $options = '<a href="' . route('day-times.edit', $dayTime->id) . '" <i class="fas fa-edit"></i></a>';
                $options .= ' <a onclick="deleteItem(' . $dayTime->id . ')" class="btn btn-danger" href="#"> <i class="fas fa-trash"></i> </a>';

                return $options;
            })
            ->rawColumns(['options'])
            ->make(true);
    }
}
