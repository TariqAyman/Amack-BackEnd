<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';

    protected $fillable = [
        'name', 'enabled', 'country_id', 'latitude', 'longitude', 'is_dive', 'description', 'temp', 'wind', 'emergency_phone', 'emergency_latitude', 'emergency_longitude', 'rate'
    ];


    public function sites()
    {
        return $this->hasMany(DiveSite::class, 'city_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }
}
