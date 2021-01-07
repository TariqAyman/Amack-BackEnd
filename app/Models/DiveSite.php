<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class DiveSite extends Model
{
    use LogsActivity, SoftDeletes;

    protected $table = 'dive_sites';

    protected $fillable = [
        'name', 'description', 'latitude', 'longitude', 'max_depth', 'visibility', 'current', 'city_id', 'main_taxon_id', 'license_id', 'enabled', 'special', 'rate', 'guided'
    ];

    protected static $logName = 'dive_sites';
    protected static $logAttributes = [
        'name', 'description', 'latitude', 'longitude', 'max_depth', 'visibility', 'current', 'city_id', 'main_taxon_id', 'license_id', 'enabled', 'special', 'rate', 'guided'
    ];

    public function mainTaxon()
    {
        return $this->belongsTo(Taxon::class, 'main_taxon_id', 'id');
    }

    public function subTaxons()
    {
        return $this->belongsToMany(Taxon::class, 'dive_site_taxons', 'dive_site_id', 'taxon_id')->withPivot('position')->withTimestamps();
    }

    public function dayTimes()
    {
        return $this->belongsToMany(DayTime::class, 'dive_site_day_times', 'dive_site_id', 'day_time_id')->withTimestamps();
    }

    public function seasons()
    {
        return $this->belongsToMany(Season::class, 'dive_site_seasons', 'dive_site_id', 'season_id')->withTimestamps();
    }

    public function activities()
    {
        return $this->belongsToMany(DiveActivity::class, 'dive_site_activities', 'dive_site_id', 'activity_id')->withTimestamps();
    }

    public function entries()
    {
        return $this->belongsToMany(DiveEntry::class, 'dive_site_entries', 'dive_site_id', 'entry_id')->withTimestamps();
    }

    public function license()
    {
        return $this->belongsTo(Course::class, 'license_id', 'id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function nearbySites()
    {
        return $this->belongsToMany(self::class, 'dive_site_nearby', 'owner_site_id', 'nearby_site_id')->withTimestamps();
    }

    public function equipments()
    {
        return $this->belongsToMany(Equipment::class, 'dive_site_equipments', 'dive_site_id', 'equipment_id')->withTimestamps();
    }

    public function images()
    {
        return $this->hasMany(DiveSiteImage::class, 'dive_site_id', 'id');
    }
}
