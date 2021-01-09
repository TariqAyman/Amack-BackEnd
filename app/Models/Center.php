<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Spatie\Activitylog\Traits\LogsActivity;

class Center extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;

    protected $table = 'centers';

    protected $fillable = [
        'name',
        'type',
        'premises',
        'activities',
        'mobile',
        'landline',
        'email',
        'website',
        'logo',
        'stuff_members',
        'address_1',
        'address_2',
        'center_lat',
        'center_lng',
        'manager_name',
        'manager_mobile',
        'owner_name',
        'owner_mobile',
        'full_day',
        'working_days',
        'languages',
        'amenities',
        'max_divers_per_trip',
        'max_divers_per_day',
        'max_day_divers',
        'max_night_dives',
        'max_em_dives',
        'mini_days_shore_dives',
        'mini_days_boat_dives',
        'max_days_shore_dives',
        'max_days_boat_dives',
        'mini_days_em_dives',
        'mini_days_night_dives',
        'max_days_em_dives',
        'max_days_night_dives',
        'bank_name',
        'account_name',
        'account_number',
        'enabled'
    ];

    protected static $logName = 'centers';
    protected static $logAttributes = [
        'name',
        'type',
        'premises',
        'activities',
        'mobile',
        'landline',
        'email',
        'website',
        'logo',
        'stuff_members',
        'address_1',
        'address_2',
        'center_lat',
        'center_lng',
        'manager_name',
        'manager_mobile',
        'owner_name',
        'manager_mobile',
        'full_day',
        'working_days',
        'languages',
        'amenities',
        'max_divers_per_trip',
        'max_divers_per_day',
        'max_day_divers',
        'max_night_dives',
        'max_em_dives',
        'mini_days_shore_dives',
        'mini_days_boat_dives',
        'max_days_shore_dives',
        'max_days_boat_dives',
        'mini_days_em_dives',
        'mini_days_night_dives',
        'max_days_em_dives',
        'max_days_night_dives',
        'bank_name',
        'account_name',
        'account_number',
        'enabled'
    ];

    protected $casts = [
        'working_days' => 'json',
        'amenities' => 'json',
        'full_day' => 'boolean',
        'enabled' => 'boolean',
        'languages' => 'json',
    ];

    public function schools()
    {
        return $this->belongsToMany(School::class, 'centers_schools', 'center_id', 'school_id');
    }

    public function dayTimes()
    {
        return $this->belongsToMany(DayTime::class, 'centers_day_times', 'center_id', 'day_time_id');
    }

    public function diveSites()
    {
        return $this->belongsToMany(DiveSite::class, 'centers_dive_sites', 'center_id', 'dive_site_id')
            ->withPivot([
                'custom',
                'dates',
                'guided',
                'orientation',
                'time_of_dives',
                'max_divers',
                'mini_days',
                'max_days',
                'original_price',
                'base_price',
                'full_equipment',
                'half_equipment',
            ])->withTimestamps();
    }

    public function getLogoAttribute($logo)
    {
        if (!$logo) {
            return null;
        }
        return Storage::url($logo);
    }
}
