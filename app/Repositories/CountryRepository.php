<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Models\Country;
use Illuminate\Database\Eloquent\Collection;
use Yajra\DataTables\Facades\DataTables;

class CountryRepository extends Repository
{
    public function findEnabled(): ?Collection
    {
        return Country::Where('enabled_for_dive', true)
            ->where('enabled_for_signup', true)
            ->select(['id', 'name'])->get();
    }

    public function getModel()
    {
        return Country::class;
    }

    public function getDatatable()
    {
        $data = Country::select(['id', 'name']);
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('options', function (Country $country) {
                $options = '<a href="' . route('countries.edit', $country->id) . '" <i class="fas fa-edit"></i></a>';
                $options .= ' <a onclick="deleteItem(' . $country->id . ')" class="btn btn-danger" href="#"> <i class="fas fa-trash"></i> </a>';

                return $options;
            })
            ->rawColumns(['options'])
            ->make(true);
    }
}
