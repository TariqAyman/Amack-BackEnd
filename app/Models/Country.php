<?php
declare(strict_types=1);

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = ['name', 'enabled'];

    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
