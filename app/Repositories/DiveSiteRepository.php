<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\DiveSite;
use App\Models\DiveSiteImage;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
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
            $query->whereHas('entries', function ($query) use ($diveEntries) {
                $query->whereIn('entry_id', $diveEntries);
            });
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
            ->where('enabled', '=', 1)
            ->with(['entries', 'license:id,name', 'city'
                    , 'mainTaxon:id,name,description,photo',
                    'subTaxons', 'dayTimes',
                    'seasons', 'activities'])
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function findByIdApi(int $id)
    {
        return DiveSite::query()
            ->where('id', $id)
            ->with([
                'nearbySites', 'images', 'dayTimes', 'activities', 'equipments', 'subTaxons'
            ])
            ->first();
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
        $data = DiveSite::query()->latest()->with(['city:id,name', 'mainTaxon:id,name']);
        return Datatables::of($data)
            ->addColumn('options', function (DiveSite $diveSite) {
                $options = '<a href="' . route('dive-sites.edit', $diveSite->id) . '" class="item-edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit font-medium-4"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg></a>';
                $options .= '<a onclick="deleteItem(' . $diveSite->id . ')" class="item-delete ml-lg-1"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle font-medium-4"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg></a>';
                return $options;
            })
            ->addColumn('city', function (DiveSite $diveSite) {
                return $diveSite->city->name;
            })
            ->addColumn('type', function (DiveSite $diveSite) {
                return 'type';
            })
            ->addColumn('rate', function (DiveSite $diveSite) {
                return $diveSite->rate;
            })
            ->addColumn('country', function (DiveSite $diveSite) {
                return 'country';
            })
            ->addColumn('main_type', function (DiveSite $diveSite) {
                return $diveSite->mainTaxon->name;
            })
            ->editColumn('special', function (DiveSite $diveSite) {
                return $diveSite->special ? 'Yes' : 'No';
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

    private function uploadImages($images, DiveSite $diveSite): void
    {
        foreach ($images as $imageId => $image) {
            $file = 'images.' . $imageId;
            $dir = 'dive-sites/' . $diveSite->id;

            if (($image instanceof UploadedFile) && request()->hasFile($file)) {
                DiveSiteImage::create([
                    'path' => Storage::disk('public')->put($dir, request()->file($file)),
                    'dive_site_id' => $diveSite->id,
                ]);
            }
        }
    }

    public function removeImage(int $id): void
    {
        $image = DiveSiteImage::query()->findOrFail($id);
        Storage::delete($image->path);
        $image->delete();
    }

    private function addRelatedData(DiveSite $site, array $data): void
    {
        $this->uploadImages($data['images'] ?? [], $site);
        $site->activities()->sync($data['activities'] ?? []);
        $site->entries()->sync($data['diveEntries'] ?? []);
        $site->dayTimes()->sync($data['dayTimes'] ?? []);
        $site->seasons()->sync($data['seasons'] ?? []);
        $site->subTaxons()->sync($data['subTaxons'] ?? []);
        $site->nearbySites()->sync($data['nearbySites'] ?? []);
        $site->equipments()->sync($data['equipments'] ?? []);
    }

    public function mySites()
    {
        return auth()->user()->center->diveSites;
    }
}
