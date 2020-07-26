<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\City;
use Yajra\DataTables\Facades\DataTables;

class CityRepository extends Repository
{
    public function findByPartName($request)
    {
        return City::query()
            ->where('name', 'like', '%' . $request->get('name') . '%')
            ->whereHas('diveCity')
            ->with('diveCity:id,city_id')
            ->select('id', 'name')
            ->get();
    }

    public function getModel()
    {
        return City::class;
    }

    public function getDatatable()
    {
        $data = City::select(['id', 'name', 'country_id'])->with('country:id,name');
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('options', function (City $city) {
                $options = '<a href="' . route('cities.edit', $city->id) . '" <i class="fas fa-edit"></i></a>';
                $options .= ' <a onclick="deleteItem(' . $city->id . ')" class="btn btn-danger" href="#"> <i class="fas fa-trash"></i> </a>';

                return $options;
            })
            ->addColumn('country', function (City $city) {
                return $city->country->name;
            })
            ->rawColumns(['options'])
            ->make(true);
    }
}
