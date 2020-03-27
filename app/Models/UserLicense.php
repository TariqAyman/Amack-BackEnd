<?php
declare(strict_types=1);

namespace App\Models;


use Illuminate\Database\Eloquent\Relations\Pivot;

class UserLicense extends Pivot
{
    protected $table = 'user_licenses';
    protected $fillable = ['license_id', 'user_id', 'license_number', 'front_photo', 'back_photo'];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }
}
