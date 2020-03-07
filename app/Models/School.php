<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $table = 'diving_schools';

    protected $fillable = ['name', 'logo'];

    public function courses()
    {
        return $this->hasMany(Course::class, 'school_id');
    }
}
