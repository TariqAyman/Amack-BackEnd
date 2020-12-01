<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class City extends Model
{
    use LogsActivity, SoftDeletes;

    protected $table = 'cities';

    protected $fillable = [
        'name', 'enabled', 'country_id', 'latitude', 'longitude', 'is_dive', 'description', 'temp', 'wind', 'emergency_phone', 'emergency_latitude', 'emergency_longitude', 'rate', 'peak_season_id'
    ];

    protected static $logName = 'cities';
    protected static $logAttributes = [
        'name', 'enabled', 'country_id', 'latitude', 'longitude', 'is_dive', 'description', 'temp', 'wind', 'emergency_phone', 'emergency_latitude', 'emergency_longitude', 'rate', 'peak_season_id'
    ];


    public function top_sites()
    {
        return $this->belongsToMany(DiveSite::class, 'city_top_sites', 'city_id', 'dive_site_id');
    }

    public function sites()
    {
        return $this->hasMany(DiveSite::class, 'city_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }

    public function peak_season()
    {
        return $this->belongsTo(Season::class, 'peak_season_id');
    }

    public function images()
    {
        return $this->hasMany(CityImages::class, 'city_id');
    }

    // todo: dive sites count , centers count  , peak season , top sites , current temp , average wind , about , emergency { icon , number , location } , top placed
}
