<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'countries';

    protected $fillable = ['name', 'enabled_for_dive','enabled_for_signup'];

    public function cities()
    {
        return $this->hasMany(City::class, 'country_id');
    }
}
