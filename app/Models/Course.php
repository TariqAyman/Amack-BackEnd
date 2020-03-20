<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'diving_courses';

    protected $fillable = [
        'title', 'description', 'school_id'
    ];
}
