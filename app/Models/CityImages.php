<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class CityImages extends Model
{
    protected $table = 'city_images';

    protected $fillable = [
        'city_id', 'image'
    ];

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function getImageAttribute($image)
    {
        if (!$image) {
            return null;
        }
        return Storage::url($image);
    }
}
