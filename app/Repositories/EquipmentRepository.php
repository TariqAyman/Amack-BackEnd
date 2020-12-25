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
                $options = '<a href="' . route('equipments.edit', $equipment->id) . '" <i class="fas fa-edit"></i></a>';
                $options .= ' <a onclick="deleteItem(' . $equipment->id . ')" class="btn btn-danger" href="#"> <i class="fas fa-trash"></i> </a>';

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
