<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiveCity extends Model
{
    protected $table = 'dive_cities';

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }
}
