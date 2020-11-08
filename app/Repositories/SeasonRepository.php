<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Season;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class SeasonRepository extends Repository
{
    public function getModel()
    {
        return Season::class;
    }

    public function getDatatable()
    {
        $data = Season::query()->select(['id', 'name']);
        return Datatables::of($data)
            ->addColumn('options', function (Season $season) {
                $options = '<a href="' . route('seasons.edit', $season->id) . '" <i class="fas fa-edit"></i></a>';
                $options .= ' <a onclick="deleteItem(' . $season->id . ')" class="btn btn-danger" href="#"> <i class="fas fa-trash"></i> </a>';

                return $options;
            })
            ->rawColumns(['options'])
            ->make(true);
    }

    public function insert(array $data): Model
    {
        /** @var Season $season */
        $season = $this->model::query()->create($data);
        $this->uploadImage($data, $season);
        return $season->fresh();
    }

    public function update(int $id, array $data): Model
    {
        /** @var Season $season */
        $season = $this->find($id);
        $season->update($data);
        $this->uploadImage($data, $season);
        return $season->fresh();
    }

    private function uploadImage(array $data, Season $diveActivity): void
    {
        if (isset($data['icon']) && ($data['icon'] instanceof UploadedFile) && request()->hasFile('icon')) {
            $dir = 'dive-seasons/' . $diveActivity->id;
            $diveActivity->icon = Storage::disk('public')->put($dir, request()->file('icon'));
            $diveActivity->save();
        }
    }

    public function removeImage(int $id): void
    {
        $time = $this->find($id);
        Storage::delete($time->icon);
        $time->icon = '';
        $time->save();
    }
}
