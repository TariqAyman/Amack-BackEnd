<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Spatie\Activitylog\Traits\LogsActivity;

class Equipment extends Model
{
    use LogsActivity, SoftDeletes;
    use CustomModelTrait;

    protected $table = 'equipments';
    protected $fillable = ['name', 'image', 'night_dive', 'nitrox', 'state', 'season_id'];

    protected static $logName = 'equipments';
    protected static $logAttributes = [
        'name', 'image', 'night_dive', 'nitrox', 'state', 'season_id'
    ];

    public function getImageAttribute($image)
    {
        if (!$image) {
            return '';
        }
        return Storage::url($image);
    }

    public function season()
    {
        return $this->belongsTo(Season::class, 'season_id');
    }

    public function sites()
    {
        return $this->belongsToMany(DiveSite::class,'dive_site_equipments','equipment_id','dive_site_id');
    }

    public function getStateAttribute($value): string
    {
        return Str::lower($value);
    }
}
