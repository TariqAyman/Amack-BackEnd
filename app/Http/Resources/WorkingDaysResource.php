<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WorkingDaysResource extends JsonResource
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
            "sunday" => $this->sunday,
            "monday" => $this->monday,
            "tuesday" => $this->tuesday,
            "wednesday" => $this->wednesday,
            "thursday" => $this->thursday,
            "friday" => $this->friday,
            "saturday" => $this->saturday,
        ];
    }
}
