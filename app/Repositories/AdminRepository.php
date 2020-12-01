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
                $options = '<a href="' . route('admins.edit', $admin->id) . '" <i class="fas fa-edit"></i></a>';
                $options .= ' <a onclick="deleteItem(' . $admin->id . ')" class="btn btn-danger" href="#"> <i class="fas fa-trash"></i> </a>';

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
