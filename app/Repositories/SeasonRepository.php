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
                $options = '<a href="' . route('seasons.edit', $season->id) . '" class="item-edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit font-medium-4"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg></a>';
                $options .= '<a onclick="deleteItem(' . $season->id . ')" class="item-delete ml-lg-1"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle font-medium-4"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg></a>';
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
