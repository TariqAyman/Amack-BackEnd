<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';

    protected $fillable = [
        'name', 'enabled', 'country_id'
    ];

    public function diveCity()
    {
        return $this->hasOne(DiveCity::class, 'city_id', 'id');
    }
}
