<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class School extends Model
{
    protected $table = 'diving_schools';

    protected $fillable = ['name', 'logo','enabled'];

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
