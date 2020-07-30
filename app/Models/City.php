<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';

    protected $fillable = [
        'name', 'enabled', 'country_id', 'latitude', 'longitude', 'is_dive'
    ];


    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }
}
