<?php

namespace App\Http\Resources;

use App\Models\DiveSiteImage;
use Illuminate\Http\Resources\Json\JsonResource;

class SimpleImagesSite extends JsonResource
{
    public function toArray($request)
    {
        $diveSiteImage = new DiveSiteImage();
        $diveSiteImage= $this->path;
        return $diveSiteImage;
    }
}
