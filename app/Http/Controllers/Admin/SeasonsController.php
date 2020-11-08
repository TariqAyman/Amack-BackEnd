<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Repositories\SeasonRepository;
use Illuminate\Http\JsonResponse;

class SeasonsController extends AdminController
{
    protected $block = 'seasons';
    protected $repository = SeasonRepository::class;

    public function removePhoto(int $id): JsonResponse
    {
        $this->repository->removeImage($id);
        return new JsonResponse('Deleted');
    }
}
