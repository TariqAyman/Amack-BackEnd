<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Taxon extends Model
{
    protected $table = 'taxons';

    protected $fillable = ['name', 'description', 'photo'];

    public function getPhotoAttribute($photo)
    {
        if (!$photo) {
            return '';
        }
        return Storage::disk('public')->url($photo);
    }
}
