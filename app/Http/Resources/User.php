<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
{

    public function toArray($request): array
    {

        $user = [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'gender' => $this->gender,
            'token' => $this->createToken('user')->accessToken
        ];
        if (null !== $this->mobile) {
            $user['mobile'] = $this->mobile;
        }
        if (null !== $this->photo) {
            $user['photo'] = $this->photo;
        }
        if (null !== $this->country_id) {
            $user['country_id'] = $this->country_id;
        }
        if (null !== $this->city_id) {
            $user['city_id'] = $this->city_id;
        }
        return $user;
    }
}
