<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Authenticatable
{
    use Notifiable, LogsActivity, SoftDeletes;
    use CustomModelTrait;
    use HasRoles;

    protected $table = 'admins';

    protected $guard = 'admin';
    protected $guard_name = 'web';

    protected $fillable = ['email', 'password', 'name', 'photo', 'gender'];

    protected static $logName = 'admins';
    protected static $logAttributes = ['name', 'email', 'photo'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    protected $dates = ['create_at', 'updated_at', 'email_verified_at'];

    public function setPasswordAttribute($value)
    {
        if (!empty($value)) {
            return $this->attributes['password'] = Hash::make($value);
        }
    }

    public function getPhotoAttribute($value)
    {
        return Storage::url($value);
    }

    // todo: title , permissions & role

    public function guardName()
    {
        return 'web';
    }
}
