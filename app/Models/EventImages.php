<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class EventImages extends Model
{
    use HasFactory;

    protected $table = 'event_images';

    protected $fillable = [
        'event_id', 'image'
    ];

    public function getImageAttribute($value): string
    {
        return Storage::url($value);
    }
}
