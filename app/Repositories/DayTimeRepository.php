<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\DayTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class DayTimeRepository extends Repository
{
    public function getModel()
    {
        return DayTime::class;
    }

    public function getDatatable()
    {
        $data = DayTime::query()->select(['id', 'name']);
        return Datatables::of($data)
            ->addColumn('options', function (DayTime $dayTime) {
                $options = '<a href="' . route('day-times.edit', $dayTime->id) . '" <i class="fas fa-edit"></i></a>';
                $options .= ' <a onclick="deleteItem(' . $dayTime->id . ')" class="btn btn-danger" href="#"> <i class="fas fa-trash"></i> </a>';

                return $options;
            })
            ->rawColumns(['options'])
            ->make(true);
    }

    public function insert(array $data): Model
    {
        /** @var DayTime $dayTime */
        $dayTime = $this->model::query()->create($data);
        $this->uploadImage($data, $dayTime);
        return $dayTime->fresh();
    }

    public function update(int $id, array $data): Model
    {
        /** @var DayTime $dayTime */
        $dayTime = $this->find($id);
        $dayTime->update($data);
        $this->uploadImage($data, $dayTime);
        return $dayTime->fresh();
    }

    private function uploadImage(array $data, DayTime $dayTime): void
    {
        if (isset($data['icon']) && ($data['icon'] instanceof UploadedFile) && request()->hasFile('icon')) {
            $dir = 'dive-times/' . $dayTime->id;
            $dayTime->icon = Storage::disk('public')->put($dir, request()->file('icon'));
            $dayTime->save();
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
