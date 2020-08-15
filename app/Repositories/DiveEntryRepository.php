<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\DiveEntry;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class DiveEntryRepository extends Repository
{
    public function getModel()
    {
        return DiveEntry::class;
    }

    public function getDatatable()
    {
        $data = DiveEntry::select(['id', 'name']);
        return Datatables::of($data)
            ->addColumn('options', function (DiveEntry $diveEntry) {
                $options = '<a href="' . route('dive-entries.edit', $diveEntry->id) . '" <i class="fas fa-edit"></i></a>';
                $options .= ' <a onclick="deleteItem(' . $diveEntry->id . ')" class="btn btn-danger" href="#"> <i class="fas fa-trash"></i> </a>';

                return $options;
            })
            ->rawColumns(['options'])
            ->make(true);
    }

    public function insert(array $data): Model
    {
        /** @var DiveEntry $entry */
        $entry = $this->model::query()->create($data);
        $this->uploadImage($data, $entry);
        return $entry->fresh();
    }

    public function update(int $id, array $data): Model
    {
        /** @var DiveEntry $entry */
        $entry = $this->find($id);
        $entry->update($data);
        $this->uploadImage($data, $entry);
        return $entry->fresh();
    }

    private function uploadImage(array $data, DiveEntry $entry): void
    {
        if (isset($data['photo']) && ($data['photo'] instanceof UploadedFile) && request()->hasFile('photo')) {
            $dir = 'dive-entries/' . $entry->id;
            $entry->photo = Storage::disk('public')->put($dir, request()->file('photo'));
            $entry->save();
        }
    }

    public function removeImage(int $id): void
    {
        $entry = $this->find($id);
        Storage::delete($entry->photo);
        $entry->photo = '';
        $entry->save();
    }
}
