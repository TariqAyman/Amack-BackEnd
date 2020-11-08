<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Season extends Model
{
    protected $table = 'seasons';

    protected $fillable = ['name','icon'];

    public function getIconAttribute($photo)
    {
        if (!$photo) {
            return null;
        }
        return Storage::disk('public')->url($photo);
    }
}
