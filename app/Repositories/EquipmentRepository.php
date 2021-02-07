<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Equipment;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class EquipmentRepository extends Repository
{
    public function getModel()
    {
        return Equipment::class;
    }

    public function getDatatable()
    {
        $data = Equipment::query()->latest()->select(['id', 'name']);
        return Datatables::of($data)
            ->addColumn('options', function (Equipment $equipment) {
                $options = '<a href="' . route('equipments.edit', $equipment->id) . '" class="item-edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit font-medium-4"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg></a>';
                $options .= '<a onclick="deleteItem(' . $equipment->id . ')" class="item-delete ml-lg-1"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle font-medium-4"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg></a>';
                return $options;
            })
            ->rawColumns(['options'])
            ->make(true);
    }

    public function insert(array $data): Model
    {
        /** @var Equipment $equipment */
        $equipment = $this->model::query()->create($data);
        $this->uploadImage($data, $equipment);
        return $equipment->fresh();
    }

    public function update(int $id, array $data): Model
    {
        /** @var Equipment $equipment */
        $equipment = $this->find($id);
        $equipment->update($data);
        $this->uploadImage($data, $equipment);
        return $equipment->fresh();
    }

    private function uploadImage(array $data, Equipment $equipment): void
    {
        if (isset($data['image']) && ($data['image'] instanceof UploadedFile) && request()->hasFile('image')) {
            $dir = 'equipments/' . $equipment->id;
            $equipment->image = Storage::disk('public')->put($dir, request()->file('image'));
            $equipment->save();
        }
    }

    public function removeImage(int $id): void
    {
        $equipment = $this->find($id);
        Storage::delete($equipment->image);
        $equipment->image = '';
        $equipment->save();
    }

    public function getByIds($ids)
    {
        return $this->model::where(function ($sql) use ($ids) {
            if (is_array($ids)) {
                $sql->whereHas('sites', function (Builder $query) use ($ids) {
                    $query->whereIn('dive_sites.id', $ids);
                });
            } else {
                $sql->whereHas('sites', function (Builder $query) use ($ids) {
                    $query->where('dive_sites.id', $ids);
                });
            }
        })->get();
    }
}
