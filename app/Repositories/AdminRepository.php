<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Facades\DataTables;

class AdminRepository extends Repository
{
    public function getModel(): string
    {
        return Admin::class;
    }

    public function getDatatable()
    {
        $data = Admin::latest()->get();
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('options', function (Admin $admin) {
                $options = '';
                if (\Auth::user()->can('admins.edit')) {
                    $options = '<a href="' . route('admins.edit', $admin->id) . '" class="item-edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit font-medium-4"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg></a>';
                }
                if (\Auth::user()->can('admins.destroy')) {
                    $options .= '<a onclick="deleteItem(' . $admin->id . ')" class="item-delete ml-lg-1"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle font-medium-4"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg></a>';
                }
                return $options;
            })
            ->rawColumns(['options'])
            ->make(true);
    }

    public function insert(array $data): Model
    {
        return $this->model::query()->create($data);
    }

    public function update(int $id, array $data): Model
    {
        $object = $this->find($id);
        if (!$data['password']) {
            unset($data['password']);
        }

        $object->update($data);
        return $object->fresh();
    }
}
