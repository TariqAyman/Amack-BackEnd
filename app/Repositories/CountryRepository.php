<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Models\Country;
use Illuminate\Database\Eloquent\Collection;

class CountryRepository implements CountryRepositoryInterface
{
    public function findAll(): ?Collection
    {
        return Country::Where('enabled', true)->select(['id', 'name'])->with(['cities' => function ($query) {
            $query->where('enabled', true)->select(['id', 'name', 'country_id']);

        }])->get();
    }

}
