<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Center;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class CenterRepository extends Repository
{
    public function findAll($columns = ['*']): Collection
    {
        return $this->getModel()::all();
    }

    public function getModel()
    {
        return Center::class;
    }

    public function getDatatable()
    {
        $data = $this->getModel()::query()->select(['id', 'name']);
        return Datatables::of($data)
            ->addColumn('options', function (Center $center) {
                $options = '<a href="' . route('centers.edit', $center->id) . '" <i class="fas fa-edit"></i></a>';
                $options .= ' <a onclick="deleteItem(' . $center->id . ')" class="btn btn-danger" href="#"> <i class="fas fa-trash"></i> </a>';

                return $options;
            })
            ->rawColumns(['options'])
            ->make(true);
    }

    public function uploadLogo(array $data, Center $center): void
    {
        Storage::delete($center->logo);
        $center->logo = '';

        if (isset($data['logo']) && ($data['logo'] instanceof UploadedFile) && request()->hasFile('logo')) {
            $dir = 'centers/' . $center->id;
            $center->logo = Storage::disk('public')->put($dir, request()->file('logo'));
        }
        $center->save();
    }

    public function removeLogo(int $id): void
    {
        $center = $this->find($id);
        Storage::delete($center->logo);
        $center->logo = '';
        $center->save();
    }

    public function insert(array $data): Model
    {
        /** @var Center $center */
        $center = $this->model::query()->create($data);
        $this->uploadLogo($data, $center);
        return $center->fresh();
    }

    public function update(int $id, array $data): Model
    {
        /** @var Center $center */
        $center = $this->find($id);
        $center->update($data);
        $this->uploadLogo($data, $center);
        return $center->fresh();
    }
}
