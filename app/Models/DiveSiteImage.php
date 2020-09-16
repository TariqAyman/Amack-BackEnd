<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class DiveSiteImage extends Model
{
    protected $table = 'dive_site_images';
    protected $fillable = ['path', 'dive_site_id'];

    public function getPathAttribute($path)
    {
        if (!$path) {
            return null;
        }
        return Storage::disk('public')->url($path);
    }
}
