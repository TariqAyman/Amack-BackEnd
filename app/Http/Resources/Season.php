<?php

namespace App\Http\Resources;

use App\Http\Views\SeasonView;
use Illuminate\Http\Resources\Json\JsonResource;

class Season extends JsonResource
{
    public function toArray($request)
    {
        $seasonView = new SeasonView();
        $seasonView->id = $this->id;
        $seasonView->name = $this->name;

        return $seasonView;
    }
}
