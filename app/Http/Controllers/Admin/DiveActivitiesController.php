<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Repositories\DiveActivityRepository;
use Illuminate\Http\JsonResponse;

class DiveActivitiesController extends AdminController
{
    protected $block = 'dive-activities';

    protected $repository = DiveActivityRepository::class;

    public function removePhoto(int $id): JsonResponse
    {
        $this->repository->removeImage($id);
        return new JsonResponse('Deleted');
    }
}
