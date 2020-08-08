<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\School;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class SchoolRepository extends Repository
{
    public function findAll($columns = ['*']): Collection
    {
        return School::with('courses:id,name,school_id')->get();
    }

    public function getModel()
    {
        return School::class;
    }

    public function getDatatable()
    {
        $data = School::query()->select(['id', 'name']);
        return Datatables::of($data)
            ->addColumn('options', function (School $school) {
                $options = '<a href="' . route('schools.edit', $school->id) . '" <i class="fas fa-edit"></i></a>';
                $options .= ' <a onclick="deleteItem(' . $school->id . ')" class="btn btn-danger" href="#"> <i class="fas fa-trash"></i> </a>';

                return $options;
            })
            ->rawColumns(['options'])
            ->make(true);
    }

    public function uploadLogo(array $data, School $school): void
    {
        Storage::delete($school->logo);
        $school->logo = '';

        if (isset($data['logo']) && ($data['logo'] instanceof UploadedFile) && request()->hasFile('logo')) {
            $dir = 'schools/' . $school->id;
            $school->logo = Storage::disk('public')->put($dir, request()->file('logo'));
        }
        $school->save();
    }

    public function removeLogo(int $id): void
    {
        $school = $this->find($id);
        Storage::delete($school->logo);
        $school->logo = '';
        $school->save();
    }

    public function insert(array $data): Model
    {
        /** @var School $school */
        $school = $this->model::query()->create($data);
        $this->uploadLogo($data, $school);
        return $school->fresh();
    }

    public function update(int $id, array $data): Model
    {
        /** @var School $school */
        $school = $this->find($id);
        $school->update($data);
        $this->uploadLogo($data, $school);
        return $school->fresh();
    }
}
