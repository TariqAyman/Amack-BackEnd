<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Country extends Model
{
    use LogsActivity , SoftDeletes;

    protected $table = 'countries';

    protected $fillable = [
        'name', 'enabled_for_dive', 'enabled_for_signup', 'code', 'phone_code', 'latitude', 'longitude'
    ];

    protected static $logName = 'countries';

    protected static $logAttributes = [
        'name', 'enabled_for_dive', 'enabled_for_signup', 'code', 'phone_code', 'latitude', 'longitude'
    ];

    public function cities()
    {
        return $this->hasMany(City::class, 'country_id');
    }
}
