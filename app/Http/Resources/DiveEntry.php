<?php

declare(strict_types=1);

namespace App\Http\Resources;


use App\Http\Views\DiveEntryView;
use Illuminate\Http\Resources\Json\JsonResource;

class DiveEntry extends JsonResource
{
    public function toArray($request): DiveEntryView
    {
        $diveEntryView = new DiveEntryView();
        $diveEntryView->id = $this->id;
        $diveEntryView->name = $this->name;
        $diveEntryView->photo = $this->photo;

        return $diveEntryView;
    }
}
