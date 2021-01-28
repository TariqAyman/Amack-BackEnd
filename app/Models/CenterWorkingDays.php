<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CenterWorkingDays extends Model
{
    use HasFactory;

    protected $table = 'center_working_days';

    protected $fillable = [
        'center_id',
        'sunday',
        'monday',
        'tuesday',
        'wednesday',
        'thursday',
        'friday',
        'saturday',
    ];

    protected $casts = [
        'sunday' => 'json',
        'monday' => 'json',
        'tuesday' => 'json',
        'wednesday' => 'json',
        'thursday' => 'json',
        'friday' => 'json',
        'saturday' => 'json',
    ];

    public function center()
    {
        return $this->belongsTo(Center::class, 'center_id');
    }
}
