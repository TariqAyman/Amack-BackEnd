<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiveEntry extends Model
{
    protected $table = 'dive_entries';

    protected $fillable = ['name'];
}
