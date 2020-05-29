<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class Profile extends JsonResource
{
    public function toArray($request)
    {
        $data = new \stdClass();
        $data->id = $this->id;
        $data->name = $this->name;
        $data->mobile = $this->mobile;
        $data->gender = $this->gender;
        $data->countryId = $this->country_id;
        if (null !== $this->cityId) {
            $data->city_id = $this->city_id;
        }
        if (null !== $this->photo) {
            $data->photo = Storage::disk('public')->url($this->photo);
        }
        if (null !== $this->defaultLicense) {
            $data->defaultLicense = [
                'id' => $this->defaultLicense->id,
                'licenseNumber' => $this->defaultLicense->license_number,
                'name' => $this->defaultLicense->course->name
            ];
        }
        if (null !== $this->licenses) {
            $data->licenses = UserLicense::collection($this->licenses);
        }
        return $data;
    }
}
