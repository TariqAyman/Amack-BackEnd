<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class UserLicense extends Pivot
{
    use LogsActivity, SoftDeletes;

    protected $table = 'user_licenses';
    protected $fillable = ['license_id', 'user_id', 'license_number', 'front_photo', 'back_photo'];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
