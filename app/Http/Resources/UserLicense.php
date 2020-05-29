<?php
declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserLicense extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->pivot->id,
            'name' => $this->name,
            'licenseNumber' => $this->pivot->license_number
        ];
    }
}
