<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Spatie\Activitylog\Traits\LogsActivity;

class DiveActivity extends Model
{
    use LogsActivity , SoftDeletes;

    protected $table = 'dive_activities';

    protected $fillable = ['name', 'description','icon'];

    protected static $logName = 'dive_activities';
    protected static $logAttributes = [
        'name', 'description','icon'
    ];

    public function getIconAttribute($photo)
    {
        if (!$photo) {
            return null;
        }
        return Storage::disk('public')->url($photo);
    }
}
