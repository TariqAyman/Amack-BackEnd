<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\City;
use Illuminate\Database\Eloquent\Collection;
use Yajra\DataTables\Facades\DataTables;

class CityRepository extends Repository
{

    public function search($data): ?Collection
    {
        $query = City::query();

        if ($data->city) {
            $query->where('name', 'like', '%' . $data->city . '%');
        }

        if ($data->name || $data->main_taxon_id || $data->maxDepth || $data->dayTimes || $data->activities ||
            $data->diveEntries || $data->seasons || $data->taxons || $data->rate || $data->max_depth || $data->hide_old_dives || $data->special_sites_only) {

            $query->whereHas('sites', function ($sql) use ($data) {

                if ($data->main_taxon_id) {
                    $sql->where('main_taxon_id', '=', $data->main_taxon_id);
                }

                if ($data->maxDepth) {
                    $sql->where('max_depth', '<=', $data->maxDepth);
                }

                $dayTimes = $data->dayTimes;
                if ($dayTimes) {
                    $sql->whereHas('dayTimes', function ($query) use ($dayTimes) {
                        $query->whereIn('day_time_id', $dayTimes);
                    });
                }

                $activities = $data->activities;
                if ($activities) {
                    $sql->whereHas('activities', function ($query) use ($activities) {
                        $query->whereIn('activity_id', $activities);
                    });
                }

                $diveEntries = $data->diveEntries;
                if ($diveEntries) {
                    $sql->whereHas('entries', function ($query) use ($diveEntries) {
                        $query->whereIn('entry_id', $diveEntries);
                    });
                }

                $seasons = $data->seasons;
                if ($seasons) {
                    $sql->whereHas('seasons', function ($query) use ($seasons) {
                        $query->whereIn('season_id', $seasons);
                    });
                }


                $taxons = $data->taxons;
//                if ($taxons) {
//                    $sql->where(function ($query) use ($taxons) {
//                        $query->wherein('main_taxon_id', $taxons)
//                            ->orWhere(function ($query) use ($taxons) {
//                                $query->WhereHas('subTaxons', function ($query) use ($taxons) {
//                                    $query->whereIn('taxon_id', $taxons);
//                                });
//                            });
//                    });
//                }

                if ($data->rate) {
                    $sql->where('rate', '=', $data->rate);
                }

                // todo: allow this filter
//                if ($data->hide_old_dives) {
//                    $sql->where('main_taxon_id', '=', $data->hide_old_dives);
//                }

                if ($data->special_sites_only) {
                    $sql->where('special', '=', $data->special_sites_only);
                }
            });
        }


        return $query
            ->where('enabled', '=', 1)
            ->with(['sites'])
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function findByPartName($request)
    {
        return City::query()
            ->where('name', 'like', '%' . $request->get('name') . '%')
            ->where('is_dive', '=', '1')
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

    public function getWith($id, $data)
    {
        $query = City::query()
            ->where('id', $id);

        return $query
            ->where('enabled', '=', 1)
            ->with($data)
            ->orderBy('created_at', 'desc')
            ->firstOrFail();
    }

    public function getAllWith($data)
    {
        $query = City::query();

        return $query
            ->where('enabled', '=', 1)
            ->with($data)
            ->orderBy('created_at', 'desc')
            ->get();
    }
}
