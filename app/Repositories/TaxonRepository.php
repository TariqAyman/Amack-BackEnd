<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Taxon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class TaxonRepository extends Repository
{
    public function getModel()
    {
        return Taxon::class;
    }

    public function getDatatable()
    {
        $data = Taxon::select(['id', 'name', 'description']);
        return Datatables::of($data)
            ->addColumn('options', function (Taxon $taxon) {
                $options = '<a href="' . route('taxons.edit', $taxon->id) . '" <i class="fas fa-edit"></i></a>';
                $options .= ' <a onclick="deleteItem(' . $taxon->id . ')" class="btn btn-danger" href="#"> <i class="fas fa-trash"></i> </a>';

                return $options;
            })
            ->rawColumns(['options'])
            ->make(true);
    }

    public function insert(array $data): Model
    {
        /** @var Taxon $taxon */
        $taxon = $this->model::query()->create($data);
        $this->uploadPhoto($data, $taxon);
        return $taxon->fresh();
    }

    public function update(int $id, array $data): Model
    {
        /** @var Taxon $object */
        $object = $this->find($id);
        $object->update($data);
        $this->uploadPhoto($data, $object);
        return $object->fresh();
    }

    private function uploadPhoto(array $data, Taxon $taxon): void
    {
        if (isset($data['photo']) && ($data['photo'] instanceof UploadedFile) && request()->hasFile('photo')) {
            $dir = 'taxons/' . $taxon->id;
            $taxon->photo = Storage::disk('public')->put($dir, request()->file('photo'));
            $taxon->save();
        }
    }

    public function removeImage(int $id): void
    {
        $taxon = $this->find($id);
        Storage::delete($taxon->photo);
        $taxon->photo = '';
        $taxon->save();
    }
}
