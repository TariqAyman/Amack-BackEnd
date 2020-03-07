<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
{

    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'mobile' => $this->mobile,
            'gender' => $this->gender,
            'photo' => $this->photo,
            'country_id' => $this->country_id,
            'city_id' => $this->city_id,
            'token' => $this->createToken('user')->accessToken
        ];
    }
}
