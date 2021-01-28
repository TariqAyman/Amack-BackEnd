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
        'activity_id',
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
        'languages',
        'amenities',

        'max_divers_per_trip',
        'max_divers_per_day',
        'max_day_divers',
        'max_night_dives',
        'max_em_dives',
        'max_days_shore_dives',
        'max_days_boat_dives',
        'max_days_em_dives',
        'max_days_night_dives',

        'mini_days_shore_dives',
        'mini_days_boat_dives',
        'mini_days_em_dives',
        'mini_days_night_dives',

        'currency',
        'currencies',
        'foreigner_rate',

        'shore_original_price',
        'shore_base_price',
        'boat_dives_original_price',
        'boat_base_price',

        'early_m_dive_price',
        'night_dive_price',

        'deduct_price_half_equipment',
        'deduct_price_full_equipment',

        'discounted_dives',
        'discounted_dives_roc',
        'discounted_dives_overseen',
        'discounted_divers',
        'discounted_divers_roc',
        'discounted_divers_overseen',

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
        'activity_id',
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
        'languages',
        'amenities',

        'max_divers_per_trip',
        'max_divers_per_day',
        'max_day_divers',
        'max_night_dives',
        'max_em_dives',
        'max_days_shore_dives',
        'max_days_boat_dives',
        'max_days_em_dives',
        'max_days_night_dives',

        'mini_days_shore_dives',
        'mini_days_boat_dives',
        'mini_days_em_dives',
        'mini_days_night_dives',

        'currency',
        'currencies',
        'foreigner_rate',

        'shore_original_price',
        'shore_base_price',
        'boat_dives_original_price',
        'boat_base_price',

        'early_m_dive_price',
        'night_dive_price',

        'deduct_price_half_equipment',
        'deduct_price_full_equipment',

        'discounted_dives',
        'discounted_dives_roc',
        'discounted_dives_overseen',
        'discounted_divers',
        'discounted_divers_roc',
        'discounted_divers_overseen',

        'bank_name',
        'account_name',
        'account_number',
        'enabled'
    ];

    protected $casts = [
        'amenities' => 'json',
        'currencies' => 'json',
        'enabled' => 'boolean',
        'languages' => 'json',
    ];

    public function activity()
    {
        dd($this->belongsTo(DiveActivity::class, 'activity_id'));
        return $this->belongsTo(DiveActivity::class, 'activity_id');
    }

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

    public function cities()
    {
        return City::whereIn('id', $this->diveSites()->pluck('city_id'))->get();
    }

    public function getLogoAttribute($logo)
    {
        if (!$logo) {
            return null;
        }
        return Storage::url($logo);
    }

    public function equipment()
    {
        return $this->belongsToMany(Equipment::class, 'center_equipments', 'center_id', 'equipment_id')->withPivot([
            'price_per_dive',
            'base_price',
            'specials'
        ])->withTimestamps();
    }

    public function working_days()
    {
        return $this->hasOne(CenterWorkingDays::class, 'center_id');
    }
}
