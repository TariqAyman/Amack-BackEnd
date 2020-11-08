<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\DiveActivity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class DiveActivityRepository extends Repository
{
    public function getModel()
    {
        return DiveActivity::class;
    }

    public function getDatatable()
    {
        $data = DiveActivity::select(['id', 'name', 'description']);
        return Datatables::of($data)
            ->addColumn('options', function (DiveActivity $activity) {
                $options = '<a href="' . route('dive-activities.edit', $activity->id) . '" <i class="fas fa-edit"></i></a>';
                $options .= ' <a onclick="deleteItem(' . $activity->id . ')" class="btn btn-danger" href="#"> <i class="fas fa-trash"></i> </a>';

                return $options;
            })
            ->rawColumns(['options'])
            ->make(true);
    }

    public function insert(array $data): Model
    {
        /** @var DiveActivity $diveActivity */
        $diveActivity = $this->model::query()->create($data);
        $this->uploadImage($data, $diveActivity);
        return $diveActivity->fresh();
    }

    public function update(int $id, array $data): Model
    {
        /** @var DiveActivity $diveActivity */
        $diveActivity = $this->find($id);
        $diveActivity->update($data);
        $this->uploadImage($data, $diveActivity);
        return $diveActivity->fresh();
    }

    private function uploadImage(array $data, DiveActivity $diveActivity): void
    {
        if (isset($data['icon']) && ($data['icon'] instanceof UploadedFile) && request()->hasFile('icon')) {
            $dir = 'dive-activities/' . $diveActivity->id;
            $diveActivity->icon = Storage::disk('public')->put($dir, request()->file('icon'));
            $diveActivity->save();
        }
    }

    public function removeImage(int $id): void
    {
        $model = $this->find($id);
        Storage::delete($model->icon);
        $model->icon = '';
        $model->save();
    }
}
