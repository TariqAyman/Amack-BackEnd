<?php

declare(strict_types=1);

namespace App\Repositories;


use App\Models\DiveEntry;
use Yajra\DataTables\Facades\DataTables;

class DiveEntryRepository extends Repository
{

    public function getModel()
    {
        return DiveEntry::class;
    }

    public function getDatatable()
    {
        $data = DiveEntry::select(['id', 'name']);
        return Datatables::of($data)
            ->addColumn('options', function (DiveEntry $diveEntry) {
                $options = '<a href="' . route('dive-entries.edit', $diveEntry->id) . '" <i class="fas fa-edit"></i></a>';
                $options .= ' <a onclick="deleteItem(' . $diveEntry->id . ')" class="btn btn-danger" href="#"> <i class="fas fa-trash"></i> </a>';

                return $options;
            })
            ->rawColumns(['options'])
            ->make(true);
    }
}
