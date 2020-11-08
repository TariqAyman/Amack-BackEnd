<?php

declare(strict_types=1);

namespace App\Http\Resources;

use App\Http\Views\DayTimeView;
use Illuminate\Http\Resources\Json\JsonResource;

class DayTime extends JsonResource
{
    public function toArray($request)
    {
        // todo: get icon
        $diveTimeView = new DayTimeView();
        $diveTimeView->id = $this->id;
        $diveTimeView->name = $this->name;
        $diveTimeView->icon = $this->icon;
        return $diveTimeView;
    }
}
