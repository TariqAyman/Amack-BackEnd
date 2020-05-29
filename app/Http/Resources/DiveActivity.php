<?php

namespace App\Http\Resources;

use App\Http\Views\DiveActivityView;
use Illuminate\Http\Resources\Json\JsonResource;

class DiveActivity extends JsonResource
{
    public function toArray($request)
    {
        $diveActivityView = new DiveActivityView();
        $diveActivityView->id = $this->id;
        $diveActivityView->name = $this->name;
        return $diveActivityView;
    }
}
