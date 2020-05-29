<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\DiveSite;
use Illuminate\Database\Eloquent\Collection;

class DiveSiteRepository
{
    public function search($data): ?Collection
    {
        $query = DiveSite::query();
        if ($data->main_taxon_id) {
            $query->where('main_taxon_id', '=', $data->main_taxon_id);
        }

        return $query
            ->with(['entry:id,name','license:id,name','diveCity','diveCity.city'
                , 'mainTaxon:id,name,description',
                'subTaxons', 'dayTimes',
                'seasons', 'activities'])
            ->orderBy('created_at', 'desc')
            ->get();
    }
}
