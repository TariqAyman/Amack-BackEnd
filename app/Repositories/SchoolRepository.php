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

                $options = '';
                if (\Auth::user()->can('schools.edit')) {
                    $options = '<a href="' . route('schools.edit', $school->id) . '" class="item-edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit font-medium-4"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg></a>';
                }
                if (\Auth::user()->can('schools.destroy')) {
                    $options .= '<a onclick="deleteItem(' . $school->id . ')" class="item-delete ml-lg-1"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle font-medium-4"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg></a>';
                }
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
