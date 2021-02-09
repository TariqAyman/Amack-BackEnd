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
                $options = '';
                if (\Auth::user()->can('staff.edit')) {
                    $options = '<a href="' . route('staff.edit', $staff->id) . '" class="item-edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit font-medium-4"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg></a>';
                }
                if (\Auth::user()->can('staff.destroy')) {
                    $options .= '<a onclick="deleteItem(' . $staff->id . ')" class="item-delete ml-lg-1"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle font-medium-4"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg></a>';
                }
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
