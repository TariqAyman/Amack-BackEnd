<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiveActivity extends Model
{
    protected $table = 'dive_activities';

    protected $fillable = ['name', 'description'];
}
