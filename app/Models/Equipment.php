<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Equipment extends Model
{
    protected $table = 'equipments';
    protected $fillable = ['name', 'image', 'night_dive', 'nitrox', 'state', 'season_id'];

    public function getImageAttribute($image)
    {
        if (!$image) {
            return '';
        }
        return Storage::disk('public')->url($image);
    }
}
