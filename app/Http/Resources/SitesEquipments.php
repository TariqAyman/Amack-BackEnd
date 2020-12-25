<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SitesEquipments extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'main' => EquipmentResource::collection($this->main),
            'extra' => EquipmentResource::collection($this->extra),
        ];
    }
}
