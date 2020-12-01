<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Spatie\Activitylog\Traits\LogsActivity;

class DiveEntry extends Model
{
    use LogsActivity, SoftDeletes;

    protected $table = 'dive_entries';

    protected $fillable = ['name', 'photo'];

    protected static $logName = 'dive_entries';
    protected static $logAttributes = [
        'name', 'photo'
    ];


    public function getPhotoAttribute($photo)
    {
        if (!$photo) {
            return null;
        }
        return Storage::disk('public')->url($photo);
    }
}
