<?php

declare(strict_types=1);

namespace App\Repositories;


use App\Models\City;

class CityRepository
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
}
