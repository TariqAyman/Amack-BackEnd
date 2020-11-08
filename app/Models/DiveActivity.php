<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class DiveActivity extends Model
{
    protected $table = 'dive_activities';

    protected $fillable = ['name', 'description','icon'];

    public function getIconAttribute($photo)
    {
        if (!$photo) {
            return null;
        }
        return Storage::disk('public')->url($photo);
    }
}
