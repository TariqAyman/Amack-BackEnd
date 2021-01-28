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
                $options = '<a href="' . route('dive-sites.edit', $diveSite->id) . '" <i class="fas fa-edit"></i></a>';
                $options .= ' <a onclick="deleteItem(' . $diveSite->id . ')" class="btn btn-danger" href="#"> <i class="fas fa-trash"></i> </a>';

                return $options;
            })
            ->addColumn('city', function (DiveSite $diveSite) {
                return $diveSite->city->name;
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
