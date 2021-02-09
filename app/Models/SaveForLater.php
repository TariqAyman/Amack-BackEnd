<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaveForLater extends Model
{
    use HasFactory;

    protected $table = 'save_for_later';

    protected $fillable = [
        'user_id',
        'hash',
        'dive_site_id',
        'options'
    ];

    protected $casts = [
        'options' => 'json'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function diveSite()
    {
        return $this->belongsTo(DiveSite::class, 'dive_site_id');
    }

}
