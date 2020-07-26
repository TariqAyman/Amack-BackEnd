<?php

declare(strict_types=1);

namespace App\Repositories;


use App\Models\Taxon;
use Yajra\DataTables\Facades\DataTables;

class TaxonRepository extends Repository
{

    public function getModel()
    {
        return Taxon::class;
    }

    public function getDatatable()
    {
        $data = Taxon::select(['id', 'name', 'description']);
        return Datatables::of($data)
            ->addColumn('options', function (Taxon $taxon) {
                $options = '<a href="' . route('taxons.edit', $taxon->id) . '" <i class="fas fa-edit"></i></a>';
                $options .= ' <a onclick="deleteItem(' . $taxon->id . ')" class="btn btn-danger" href="#"> <i class="fas fa-trash"></i> </a>';

                return $options;
            })
            ->rawColumns(['options'])
            ->make(true);
    }
}
