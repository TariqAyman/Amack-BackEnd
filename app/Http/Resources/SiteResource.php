<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SiteResource extends JsonResource
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
            "id" => $this->id,
            "name" => $this->name,
            "images" => $this->images->pluck('path'),
            "site_type" => $this->mainTaxon->name,
            "max_depth" => $this->max_depth,
            "visibility" => $this->visibility,
            "required_license" => "",
            "time_of_day" => DayTime::collection($this->dayTimes),
            "activities" => DiveActivity::collection($this->activities),
            "when_to_visit" => [],
            "site_features" => Taxon::collection($this->subTaxons),
            "recommended_equipment" => EquipmentResource::collection($this->equipments),
            "near_sites" => NearbySiteResource::collection($this->nearbySites),
            "rate" => $this->rate,
            "isSpecial" => $this->special,
            "isAvailable" => $this->enabled
        ];
    }
}
