<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Spatie\Activitylog\Traits\LogsActivity;

class DayTime extends Model
{
    use LogsActivity, SoftDeletes;

    protected $table = 'day_times';
    protected $fillable = ['name', 'icon'];

    protected static $logName = 'day_times';
    protected static $logAttributes = [
        'name', 'icon'
    ];

    public function getIconAttribute($photo)
    {
        if (!$photo) {
            return null;
        }
        return Storage::url($photo);
    }
}
