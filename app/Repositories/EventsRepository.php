<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Event;
use App\Models\EventImages;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class EventsRepository extends Repository
{
    public function findAll($columns = ['*']): Collection
    {
        return $this->getModel()::all();
    }

    public function getModel()
    {
        return Event::class;
    }

    public function getDatatable()
    {
    }

    private function uploadImages($images, Event $event): void
    {
        foreach ($images as $imageId => $image) {
            $file = 'images.' . $imageId;
            $dir = 'events/' . $event->id;

            if (($image instanceof UploadedFile) && request()->hasFile($file)) {
                EventImages::create([
                    'image' => Storage::disk('public')->put($dir, request()->file($file)),
                    'event_id' => $event->id,
                ]);
            }
        }
    }

//    public function removeLogo(int $id): void
//    {
//        $center = $this->find($id);
//        Storage::delete($center->logo);
//        $center->logo = '';
//        $center->save();
//    }

    public function insertShore(array $data): Model
    {
        /** @var Event $event */
        $data['center_id'] = auth()->user()->center_id;
        $data['staff_id'] = auth()->user()->id;
        $data['type'] = 'shore';
        $data = $this->refactorData($data);
        $event = $this->model::query()->create($data);
        if (!empty($data['sites'])) $event->sites()->sync($data['sites']);
        if (!empty($data['equipments'])) $event->equipment()->sync($data['equipments']);
        $this->uploadImages($data['images'], $event);
        return $event->fresh();
    }

    public function update(int $id, array $data): Model
    {
        /** @var Event $event */
        $event = $this->find($id);

        $data['center_id'] = auth()->user()->center_id;
        $data['staff_id'] = auth()->user()->id;
        $data['type'] = 'shore';
        $data = $this->refactorData($data);

        $event->update($data);
        if (!empty($data['sites'])) $event->sites()->sync($data['sites']);
        if (!empty($data['equipments'])) $event->equipment()->sync($data['equipments']);
        $this->uploadImages($data['images'], $event);
        return $event->fresh();
    }

    public function refactorData($data)
    {
        $new = $data;
        $new['guided'] = isset($data['guided']);
        $new['is_public'] = isset($data['is_public']);
        $new['take_credit'] = isset($data['take_credit']);
        return $new;
    }

    public function myEvent()
    {
        return $this->model->where('center_id', auth()->user()->center_id)
            ->get()->map(function ($row) {
                return [
                    'id' => $row->id,
                    'url' => '',
                    'title' => 'Temp Name',
                    'start' => $row->trip_date,
                    'end' => Carbon::parse($row->trip_date)->addDays($row->trip_duration)->format('Y-m-d h:s:i'),
                    'allDay' => true,
                    'extendedProps' => [
                        'calendar' => $row->type
                    ]
                ];
            });
    }
}
