<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'diving_courses';

    protected $fillable = [
        'name', 'description', 'school_id'
    ];

    public function school()
    {
        return $this->belongsTo(School::class, 'school_id', 'id');
    }
}
