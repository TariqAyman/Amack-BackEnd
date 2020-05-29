<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiveSite extends Model
{
    protected $table = 'dive_sites';

    public function mainTaxon()
    {
        return $this->belongsTo(Taxon::class, 'main_taxon_id', 'id');
    }

    public function subTaxons()
    {
        return $this->belongsToMany(Taxon::class, 'dive_site_taxons', 'dive_site_id', 'taxon_id');
    }

    public function entry()
    {
        return $this->belongsTo(DiveEntry::class, 'dive_entry_id', 'id');
    }

    public function dayTimes()
    {
        return $this->belongsToMany(DayTime::class, 'dive_site_day_times', 'dive_site_id', 'day_time_id');
    }

    public function seasons()
    {
        return $this->belongsToMany(Season::class, 'dive_site_seasons', 'dive_site_id', 'season_id');
    }

    public function activities()
    {
        return $this->belongsToMany(DiveActivity::class, 'dive_site_activities', 'dive_site_id', 'activity_id');
    }

    public function license()
    {
        return $this->belongsTo(Course::class, 'license_id', 'id');
    }

    public function diveCity()
    {
        return $this->belongsTo(DiveCity::class, 'dive_city_id', 'id');
    }
}
