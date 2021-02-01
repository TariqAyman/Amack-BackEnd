<?php

namespace App\Models;

use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use HasFactory;
    use SoftDeletes, SoftCascadeTrait;

    protected $table = 'events';

    protected $fillable = [
        'center_id',
        'staff_id',
        'type',
        'guided',
        'is_public',
        'take_credit',
        'trip_date',
        'trip_duration',
        'divers_per_trip',
        'min_days',
        'max_days',
        'arrival_time',
        'transportation',
        'required_license',
        'type_of_dives',
        'nitrox',

        'shore_original_price',
        'shore_base_price',
        'deduct_half_equipment',
        'deduct_half_equipment',

        'voyage_time',
        'boat_name',
        'total_boat',
        'departs_from',
        'arrives_at',
    ];

    public function center()
    {
        return $this->belongsTo(Center::class, 'center_id');
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class, 'staff_id');
    }

    public function equipment()
    {
        return $this->belongsToMany(Equipment::class, 'event_equipments', 'event_id', 'equipment_id');
    }

    public function sites()
    {
        return $this->belongsToMany(DiveSite::class, 'event_dive_sites', 'event_id', 'dive_site_id');
    }

    public function images()
    {
        return $this->hasMany(EventImages::class, 'event_id');
    }
}
