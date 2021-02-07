<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Spatie\Activitylog\Traits\LogsActivity;

class Taxon extends Model
{
    use LogsActivity, SoftDeletes;
    use CustomModelTrait;

    protected $table = 'taxons';

    protected $fillable = ['name', 'description', 'photo'];

    protected static $logName = 'taxons';

    protected static $logAttributes = [
        'name', 'description', 'photo'
    ];

    public function getPhotoAttribute($photo)
    {
        if (!$photo) {
            return null;
        }
        return Storage::url($photo);
    }
}
