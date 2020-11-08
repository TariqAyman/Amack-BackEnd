<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Repositories\DayTimeRepository;
use Illuminate\Http\JsonResponse;

class DayTimesController extends AdminController
{
    protected $block = 'day-times';
    protected $repository = DayTimeRepository::class;

    public function removePhoto(int $id): JsonResponse
    {
        $this->repository->removeImage($id);
        return new JsonResponse('Deleted');
    }
}
