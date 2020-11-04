<?php

declare(strict_types=1);

namespace App\Http\Resources;

use App\Http\Views\DiveCityView;
use Illuminate\Http\Resources\Json\JsonResource;

class DiveCity extends JsonResource
{
    public function toArray($request)
    {
        $diveCityView = new DiveCityView();
        $diveCityView->id = $this->id;
        $diveCityView->name = $this->name;
        $diveCityView->longitude = $this->longitude;
        $diveCityView->latitude = $this->latitude;
        $diveCityView->description = $this->description;
        $diveCityView->temp = $this->temp;
        $diveCityView->wind = $this->wind;
        $diveCityView->rate = $this->rate;
    
        return $diveCityView;
    }
}
