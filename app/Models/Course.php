<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'diving_courses';

    protected $fillable = [
        'name', 'description', 'school_id', 'license_type', 'required_license_id', 'learning_type', 'days_num'
    ];

    public function school()
    {
        return $this->belongsTo(School::class, 'school_id', 'id');
    }

    public function requiredLicense()
    {
        return $this->belongsTo(self::class, 'required_license_id', 'id');
    }
}
