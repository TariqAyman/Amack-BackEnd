<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserContact extends Model
{
    use HasFactory;

    protected $table = 'user_contacts';

    protected $fillable = [
        'user_id', 'mobile'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function setUserIdAttribute($value)
    {
        $this->attributes['user_id'] = auth()->user()->id;
    }
}
