<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Course extends Model
{
    use LogsActivity , SoftDeletes;

    protected $table = 'diving_courses';

    protected $fillable = [
        'name', 'description', 'school_id', 'license_type', 'required_license_id', 'learning_type', 'days_num','enabled'
    ];

    protected static $logName = 'diving_courses';
    protected static $logAttributes = [
        'name', 'description', 'school_id', 'license_type', 'required_license_id', 'learning_type', 'days_num','enabled'
    ];

    public function school()
    {
        return $this->belongsTo(School::class, 'school_id', 'id');
    }

    public function requiredLicense()
    {
        return $this->belongsTo(self::class, 'required_license_id', 'id');
    }

    // todo: number of dives
}
