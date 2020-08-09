<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class DiveEntry extends Model
{
    protected $table = 'dive_entries';

    protected $fillable = ['name', 'photo'];

    public function getPhotoAttribute($photo)
    {
        if (!$photo) {
            return '';
        }
        return Storage::disk('public')->url($photo);
    }
}
