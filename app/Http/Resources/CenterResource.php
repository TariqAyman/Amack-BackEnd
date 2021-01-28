<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CenterResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     * @throws \Exception
     */
    public function toArray($request)
    {

        return [
            "id" => $this->id,
            "name" => $this->name,
            "images" => [$this->logo],
            "cover" => $this->logo,
            "location" => $this->address_1,
            "about_center" => [
                "rate" => 4.5,
                "working_days" => new WorkingDaysResource($this->working_days),
                "languages" => $this->languages,
                "agencies" => ["PADI", "SSL"],
                "activities" => $this->activities
            ],
            "features" => $this->amenities,
            "sites" => SiteResource::collection($this->sites),
            "info" => [
                "start_date" => "10 - 10 -2020",
                "arrival_time" => "9=>00 AM",
                "activity" => "SCUBA Dive",
                "purpose" => "Recreational",
                "dive_guid" => "Mandatory",
                "buddies" => [
                    "member" => [
                        [
                            "id" => 1,
                            "images" => "url"
                        ]
                    ],
                ],
                "invoice" => [

                ]
            ],
            "isVerified" => random_int(0, 1)
        ];


//        return [
//            "id" => $this->id,
//            "name" => $this->name,
//            "type" => $this->type,
//            "premises" => $this->premises,
//            "activities" => $this->activities,
//            "mobile" => $this->mobile,
//            "landline" => $this->landline,
//            "email" => $this->email,
//            "website" => $this->website,
//            "logo" => $this->logo,
//            "stuff_members" => $this->stuff_members,
//            "address_1" => $this->address_1,
//            "address_2" => $this->address_2,
//            "center_lat" => $this->center_lat,
//            "center_lng" => $this->center_lng,
//            "manager_name" => $this->manager_name,
//            "manager_mobile" => $this->manager_mobile,
//            "owner_name" => $this->owner_name,
//            "owner_mobile" => $this->owner_mobile,
//            "full_day" => $this->full_day,
//            "working_days" => $this->working_days,
//            "amenities" => $this->amenities,
//            "languages" => $this->languages,
//            "max_divers_per_trip" => $this->max_divers_per_trip,
//            "max_divers_per_day" => $this->max_divers_per_day,
//            "max_day_divers" => $this->max_day_divers,
//            "max_night_dives" => $this->max_night_dives,
//            "max_em_dives" => $this->max_em_dives,
//            "mini_days_shore_dives" => $this->mini_days_shore_dives,
//            "mini_days_boat_dives" => $this->mini_days_boat_dives,
//            "max_days_shore_dives" => $this->max_days_shore_dives,
//            "max_days_boat_dives" => $this->max_days_boat_dives,
//            "mini_days_em_dives" => $this->mini_days_em_dives,
//            "mini_days_night_dives" => $this->mini_days_night_dives,
//            "max_days_em_dives" => $this->max_days_em_dives,
//            "max_days_night_dives" => $this->max_days_night_dives,
//            "bank_name" => $this->bank_name,
//            "account_name" => $this->account_name,
//            "account_number" => $this->account_number,
//            "sites" => SiteResource::collection($this->sites)
//        ];
    }
}
