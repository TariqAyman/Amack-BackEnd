<?php

namespace App\Http\Resources;

use App\Http\Views\SeasonView;
use Illuminate\Http\Resources\Json\JsonResource;

class Season extends JsonResource
{
    public function toArray($request)
    {
        // todo: get icon
        $seasonView = new SeasonView();
        $seasonView->id = $this->id;
        $seasonView->name = $this->name;
        $seasonView->icon = $this->icon;
        return $seasonView;
    }
}
