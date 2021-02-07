<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Laravel\Passport\HasApiTokens;
use App\Notifications\ResetPassword as ResetPasswordNotification;
use Spatie\Activitylog\Traits\LogsActivity;

class User extends Authenticatable
{
    use LogsActivity, SoftDeletes;

    use HasApiTokens, Notifiable;
    use CustomModelTrait;

    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'mobile', 'birth_date', 'photo', 'city_id', 'country_id', 'default_license'
    ];

    protected static $logName = 'users';
    protected static $logAttributes = [
        'name', 'email', 'password', 'mobile', 'birth_date', 'photo', 'city_id', 'country_id', 'default_license'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function licenses()
    {
        return $this->belongsToMany(Course::class, 'user_licenses', 'user_id', 'course_id')
            ->withPivot('id', 'license_number', 'front_photo', 'back_photo');
    }

    public function setPasswordAttribute($value)
    {
        if (!empty($value)) {
            return $this->attributes['password'] = Hash::make($value);
        }
    }

    public function defaultLicense()
    {
        return $this->belongsTo(UserLicense::class, 'default_license', 'id');
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function getPhotoAttribute($photo)
    {
        if (!$photo) {
            return null;
        }
        return Storage::url($photo);
    }
    // todo : gender , is_mobile_verified
}
