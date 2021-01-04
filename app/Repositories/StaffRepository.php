<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Staff;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class StaffRepository extends Repository
{
    public function findAll($columns = ['*']): Collection
    {
        return $this->getModel()::all();
    }

    public function getModel()
    {
        return Staff::class;
    }

    public function getDatatable()
    {
        $data = $this->getModel()::all();
        return Datatables::of($data)
            ->addColumn('options', function (Staff $staff) {
                $options = '<a href="' . route('staff.edit', $staff->id) . '" <i class="fas fa-edit"></i></a>';
                $options .= ' <a onclick="deleteItem(' . $staff->id . ')" class="btn btn-danger" href="#"> <i class="fas fa-trash"></i> </a>';

                return $options;
            })
            ->rawColumns(['options'])
            ->make(true);
    }

    public function uploadPhoto(array $data, Staff $staff): void
    {
        Storage::delete($staff->photo);
        $staff->photo = '';

        if (isset($data['photo']) && ($data['photo'] instanceof UploadedFile) && request()->hasFile('photo')) {
            $dir = 'staff/' . $staff->id;
            $staff->photo = Storage::disk('public')->put($dir, request()->file('photo'));
        }
        $staff->save();
    }

    public function removeLogo(int $id): void
    {
        $staff = $this->find($id);
        Storage::delete($staff->photo);
        $staff->logo = '';
        $staff->save();
    }

    public function insert(array $data): Model
    {
        /** @var Staff $staff */
        $staff = $this->model::query()->create($data);
        $this->uploadPhoto($data, $staff);
        return $staff->fresh();
    }

    public function update(int $id, array $data): Model
    {
        /** @var Staff $staff */
        $staff = $this->find($id);
        $staff->update($data);
        $this->uploadPhoto($data, $staff);
        return $staff->fresh();
    }
}
