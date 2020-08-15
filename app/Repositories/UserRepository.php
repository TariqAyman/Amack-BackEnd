<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Facades\DataTables;

class UserRepository extends Repository
{
    public function getModel()
    {
        return User::class;
    }

    public function getDatatable()
    {
        $data = User::query()->select(['id', 'name', 'email']);
        return Datatables::of($data)
            ->addColumn('options', function (User $user) {
                $options = '<a href="' . route('users.edit', $user->id) . '" <i class="fas fa-edit"></i></a>';
                $options .= ' <a onclick="deleteItem(' . $user->id . ')" class="btn btn-danger" href="#"> <i class="fas fa-trash"></i> </a>';

                return $options;
            })
            ->rawColumns(['options'])
            ->make(true);
    }

    public function insert(array $data): Model
    {
        $data['password'] = bcrypt($data['password']);
        return $this->model::query()->create($data);
    }

    public function update(int $id, array $data): Model
    {
        $object = $this->find($id);
        if ($data['password']) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }

        $object->update($data);
        return $object->fresh();
    }
}
