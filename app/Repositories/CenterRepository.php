<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Center;
use App\Models\CenterWorkingDays;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class CenterRepository extends Repository
{
    public function findAll($columns = ['*']): Collection
    {
        return $this->getModel()::all();
    }

    public function getModel()
    {
        return Center::class;
    }

    public function getDatatable()
    {
        $data = $this->getModel()::query()->select(['id', 'name']);
        return Datatables::of($data)
            ->addColumn('options', function (Center $center) {
                $options = '';
                if (\Auth::user()->can('centers.edit')) {
                    $options = '<a href="' . route('centers.edit', $center->id) . '" class="item-edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit font-medium-4"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg></a>';
                }
                if (\Auth::user()->can('centers.destroy')) {
                    $options .= '<a onclick="deleteItem(' . $center->id . ')" class="item-delete ml-lg-1"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle font-medium-4"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg></a>';
                }
                return $options;
            })
            ->rawColumns(['options'])
            ->make(true);
    }

    public function uploadLogo(array $data, Center $center): void
    {
        Storage::delete($center->logo);
        $center->logo = '';

        if (isset($data['logo']) && ($data['logo'] instanceof UploadedFile) && request()->hasFile('logo')) {
            $dir = 'centers/' . $center->id;
            $center->logo = Storage::disk('public')->put($dir, request()->file('logo'));
        }
        $center->save();
    }

    public function removeLogo(int $id): void
    {
        $center = $this->find($id);
        Storage::delete($center->logo);
        $center->logo = '';
        $center->save();
    }

    public function insert(array $data): Model
    {
        /** @var Center $center */
        $center = $this->model::query()->create($data);
        $this->uploadLogo($data, $center);
        return $center->fresh();
    }

    public function update(int $id, array $data): Model
    {
        /** @var Center $center */
        $center = $this->find($id);
        $center->update($data);
        if (!empty($data['sites'])) $center->diveSites()->sync($data['sites']);
        $this->uploadLogo($data, $center);
        $this->workingDays($center->id, $data);
        return $center->fresh();
    }

    public function updateCustomSiteInfo($id, $data): ?Model
    {
        $center = $this->find(auth()->user()->center_id);
        $data = $this->refactorData($data);
        $center->diveSites()->updateExistingPivot($id, $data);
        return $center->fresh();
    }

    public function updateSites(int $id, array $data)
    {
        $center = $this->find($id);
        if (!empty($data['sites'])) $center->diveSites()->sync($data['sites']);
    }

    public function refactorData($data)
    {
        $new = $data;
        $new['custom'] = true;
        $new['guided'] = $data['guided'] ?? 'off' == 'on';
        return $new;
    }

    public function workingDays($centerId, $request)
    {
        if ($days = $request['days'] ?? false) {
            foreach ($days as $index => $day) {
                $days[$index]['off'] = isset($day['off']);
                $days[$index]['all'] = isset($day['all']);
            }

            CenterWorkingDays::updateOrCreate(['center_id' => $centerId],
                [
                    'sunday' => $days['sunday'],
                    'monday' => $days['monday'],
                    'tuesday' => $days['tuesday'],
                    'wednesday' => $days['wednesday'],
                    'thursday' => $days['thursday'],
                    'friday' => $days['friday'],
                    'saturday' => $days['saturday'],
                ]);
        }
    }
}
