<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class License extends Model
{
    use LogsActivity, SoftDeletes;

    protected $table = 'licenses';

    protected $fillable = [
        'name', 'school_id', 'description', 'type', 'enable'
    ];

    protected static $logName = 'licenses';
    protected static $logAttributes = [
        'name', 'school_id', 'description', 'type', 'enable'
    ];
}
