<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\DiveSite;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Facades\DataTables;

class DiveSiteRepository extends Repository
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
                'city',
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
            ->with(['entry:id,name', 'license:id,name', 'city'
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

    public function getModel()
    {
        return DiveSite::class;
    }

    public function getDatatable()
    {
        $data = DiveSite::select(['id', 'name']);
        return Datatables::of($data)
            ->addColumn('options', function (DiveSite $diveSite) {
                $options = '<a href="' . route('dive-sites.edit', $diveSite->id) . '" <i class="fas fa-edit"></i></a>';
                $options .= ' <a onclick="deleteItem(' . $diveSite->id . ')" class="btn btn-danger" href="#"> <i class="fas fa-trash"></i> </a>';

                return $options;
            })
            ->rawColumns(['options'])
            ->make(true);
    }

    public function insert(array $data): Model
    {
        /** @var DiveSite $site */
        $site = $this->model::query()->create($data);
        $this->addRelatedData($site, $data);
        return $site;
    }

    public function update(int $id, array $data): Model
    {
        /** @var DiveSite $object */
        $object = $this->find($id);
        $object->update($data);
        $this->addRelatedData($object, $data);
        return $object->fresh();
    }

    private function addRelatedData(DiveSite $site, array $data): void
    {
        $site->activities()->detach();
        if (isset($data['activities'])) {
            foreach ($data['activities'] as $activity) {
                $site->activities()->attach($activity);
            }
        }
        $site->dayTimes()->detach();
        if (isset($data['dayTimes'])) {
            foreach ($data['dayTimes'] as $dayTime) {
                $site->dayTimes()->attach($dayTime);
            }
        }
        $site->seasons()->detach();
        if (isset($data['seasons'])) {
            foreach ($data['seasons'] as $season) {
                $site->seasons()->attach($season);
            }
        }
        $site->subTaxons()->detach();
        if (isset($data['subTaxons'])) {
            foreach ($data['subTaxons'] as $subTaxon) {
                $site->subTaxons()->attach($subTaxon, ['position' => 0]);
            }
        }
    }
}
