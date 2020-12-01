<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Spatie\Activitylog\Traits\LogsActivity;

class School extends Model
{
    use LogsActivity, SoftDeletes;

    protected $table = 'diving_schools';

    protected $fillable = ['name', 'logo', 'enabled'];

    protected static $logName = 'diving_schools';

    protected static $logAttributes = ['name', 'logo', 'enabled'];

    public function courses()
    {
        return $this->hasMany(Course::class, 'school_id');
    }

    public function getLogoAttribute($logo)
    {
        if (!$logo) {
            return '';
        }
        return Storage::disk('public')->url($logo);
    }
}
