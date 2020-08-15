<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\DiveActivity;
use Yajra\DataTables\Facades\DataTables;

class DiveActivityRepository extends Repository
{
    public function getModel()
    {
        return DiveActivity::class;
    }

    public function getDatatable()
    {
        $data = DiveActivity::select(['id', 'name', 'description']);
        return Datatables::of($data)
            ->addColumn('options', function (DiveActivity $activity) {
                $options = '<a href="' . route('dive-activities.edit', $activity->id) . '" <i class="fas fa-edit"></i></a>';
                $options .= ' <a onclick="deleteItem(' . $activity->id . ')" class="btn btn-danger" href="#"> <i class="fas fa-trash"></i> </a>';

                return $options;
            })
            ->rawColumns(['options'])
            ->make(true);
    }
}
