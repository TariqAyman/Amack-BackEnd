<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Season;
use Yajra\DataTables\Facades\DataTables;

class SeasonRepository extends Repository
{
    public function getModel()
    {
        return Season::class;
    }

    public function getDatatable()
    {
        $data = Season::query()->select(['id', 'name']);
        return Datatables::of($data)
            ->addColumn('options', function (Season $season) {
                $options = '<a href="' . route('seasons.edit', $season->id) . '" <i class="fas fa-edit"></i></a>';
                $options .= ' <a onclick="deleteItem(' . $season->id . ')" class="btn btn-danger" href="#"> <i class="fas fa-trash"></i> </a>';

                return $options;
            })
            ->rawColumns(['options'])
            ->make(true);
    }
}
