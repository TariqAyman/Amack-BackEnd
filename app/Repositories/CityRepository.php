<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\City;
use App\Models\CityImages;
use App\Models\DiveSite;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Database\Eloquent\Builder;

class CityRepository extends Repository
{
    public function search($data): ?Collection
    {
        $cities = City::query();

        if ($data->city) {
            $cities = $cities->where('name', 'like', '%' . $data->city . '%');
        }

        $cities = $cities->where('enabled', '=', 1)->orderBy('created_at', 'desc')->get();

        foreach ($cities as $index => $city) {
            if ($data->name || $data->main_taxon_id || $data->maxDepth || $data->dayTimes || $data->activities || $data->diveEntries || $data->seasons || $data->taxons ||
                $data->rate || $data->max_depth || $data->hide_old_dives || $data->special_sites_only) {

                $site = DiveSite::query()->where('city_id', $city->id);

                if ($data->name) {
                    $site->where('name', 'like', '%' . $data->name . '%');
                }

                if ($data->main_taxon_id) {
                    $site->where('main_taxon_id', '=', $data->main_taxon_id);
                }

                if ($data->maxDepth) {
                    $site->where('max_depth', '<=', $data->maxDepth);
                }

                $dayTimes = $data->dayTimes;
                if ($dayTimes) {
                    $site->whereHas('dayTimes', function (Builder $query) use ($dayTimes) {
                        $query->whereIn('day_time_id', $dayTimes);
                    });
                }

                $activities = $data->activities;
                if ($activities) {
                    $site->whereHas('activities', function (Builder $query) use ($activities) {
                        $query->whereIn('activity_id', $activities);
                    });
                }

                $diveEntries = $data->diveEntries;
                if ($diveEntries) {
                    $site->whereHas('entries', function (Builder $query) use ($diveEntries) {
                        $query->whereIn('entry_id', $diveEntries);
                    });
                }

                $seasons = $data->seasons;
                if ($seasons) {
                    $site->whereHas('seasons', function (Builder $query) use ($seasons) {
                        $query->whereIn('season_id', $seasons);
                    });
                }


                $taxons = $data->taxons;
                if ($taxons) {
                    $site->where(function ($query) use ($taxons) {
                        $query->wherein('main_taxon_id', $taxons)
                            ->orWhere(function ($query) use ($taxons) {
                                $query->whereHas('subTaxons', function ($query) use ($taxons) {
                                    $query->whereIn('taxon_id', $taxons);
                                });
                            });
                    });
                }

                if ($data->rate) {
                    $site->where('rate', '=', $data->rate);
                }

                // todo: allow this filter
//                if ($data->hide_old_dives) {
//                    $sql->where('main_taxon_id', '=', $data->hide_old_dives);
//                }

                if ($data->special_sites_only) {
                    $site->where('special', '=', $data->special_sites_only);
                }

                $site->orderBy(DB::raw("3959 * acos( cos( radians({$city->latitude}) ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians(-{$city->longitude}) ) + sin( radians({$city->latitude}) ) * sin(radians(latitude)) )"), 'ASC');

                $site = $site->get();
                if ($site) $cities[$index]->sites = $site;

            }
        }

        return $cities;
    }

    public function findByPartName($request)
    {
        return $this->model::query()
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
        $data = $this->model::select(['id', 'name', 'country_id'])->with('country:id,name');
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('options', function (City $city) {
                $options = '<a href="' . route('cities.edit', $city->id) . '" class="item-edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit font-medium-4"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg></a>';
                $options .= '<a onclick="deleteItem(' . $city->id . ')" class="item-delete ml-lg-1"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle font-medium-4"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg></a>';
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
        $query = $this->model::query()
            ->where('id', $id);

        return $query
            ->where('enabled', '=', 1)
            ->with($data)
            ->orderBy('created_at', 'desc')
            ->firstOrFail();
    }

    public function getAllWith($data)
    {
        $query = $this->model::query();

        return $query
            ->where('enabled', '=', 1)
            ->with($data)
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function insert(array $data): Model
    {
        $insert = $this->model::query()->create($data);
        $this->addRelatedData($insert, $data);
    }

    public function update(int $id, array $data): Model
    {
        $object = $this->find($id);
        $object->update($data);
        $this->addRelatedData($object, $data);
        return $object->fresh();
    }

    private function uploadImages($images, City $city): void
    {
        foreach ($images as $imageId => $image) {
            $file = 'images.' . $imageId;
            $dir = 'cities/' . $city->id;

            if (($image instanceof UploadedFile) && request()->hasFile($file)) {
                CityImages::create(['image' => Storage::disk('public')->put($dir, request()->file($file)), 'city_id' => $city->id]);
            }
        }
    }

    public function removeImage(int $id): void
    {
        $image = CityImages::query()->findOrFail($id);
        Storage::delete($image->image);
        $image->delete();
    }

    private function addRelatedData(City $city, array $data): void
    {
        $city->top_sites()->sync($data['top_sites']);
        $this->uploadImages($data['images'] ?? [], $city);
    }

    public function whereIn(string $column, array $values)
    {
        return $this->model->whereIn($column, $values)->get();
    }
}
