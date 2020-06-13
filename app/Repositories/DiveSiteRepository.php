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

        if ($data->name) {
            $query->where('name', 'like', '%' . $data->name . '%');
        }

        $city = $data->city;
        if ($city) {
            $query->whereHas(
                'diveCity.city',
                function ($query) use ($city) {
                    $query->where('name', 'like', '%' . $city . '%');
                }
            );
        }
        if ($data->maxDepth) {
            $query->where('max_depth', '<=', $data->maxDepth);
        }

        $dayTimes = $data->dayTimes;
        if ($dayTimes) {
            $query->whereHas('dayTimes', function ($query) use ($dayTimes) {
                $query->whereIn('day_time_id', $dayTimes);
            });
        }

        $activities = $data->activities;
        if ($activities) {
            $query->whereHas('activities', function ($query) use ($activities) {
                $query->whereIn('activity_id', $activities);
            });
        }

        $diveEntries = $data->diveEntries;
        if ($diveEntries) {
            $query->whereIn('dive_entry_id', $diveEntries);
        }

        $seasons = $data->seasons;
        if ($seasons) {
            $query->whereHas('seasons', function ($query) use ($seasons) {
                $query->whereIn('season_id', $seasons);
            });
        }


        $taxons = $data->taxons;
        if ($taxons) {
            $query->where(function ($query) use ($taxons) {
                $query->wherein('main_taxon_id', $taxons)
                    ->orWhere(function ($query) use ($taxons) {
                        $query->WhereHas('subTaxons', function ($query) use ($taxons) {
                            $query->whereIn('taxon_id', $taxons);
                        });
                    });
            });
        }

        return $query
            ->with(['entry:id,name', 'license:id,name', 'diveCity', 'diveCity.city'
                , 'mainTaxon:id,name,description',
                'subTaxons', 'dayTimes',
                'seasons', 'activities'])
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function findByPartName($query)
    {
        return DiveSite::query()
            ->where('name', 'like', '%' . $query->name . '%')
            ->select('id', 'name')->get();
    }
}
