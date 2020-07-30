<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DayTime extends Model
{
    protected $table = 'day_times';
    protected $fillable = ['name'];

}
