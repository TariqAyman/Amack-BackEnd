<?php
declare(strict_types=1);

namespace App\Repositories;


use App\Models\Country;
use Illuminate\Database\Eloquent\Collection;

class CountryRepository implements CountryRepositoryInterface
{
    public function findAll(): ?Collection
    {
        return Country::Where('enabled', true)->with(['cities' => function ($query) {
            $query->where('enabled', true);
        }])->get();
    }

}
