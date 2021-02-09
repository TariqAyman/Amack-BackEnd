<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Repositories\SeasonRepository;
use Illuminate\Http\JsonResponse;

class SeasonsController extends AdminController
{
    protected $block = 'seasons';
    protected $repository = SeasonRepository::class;

    protected $indexBreadcrumbs = [['link' => "admin/dashboard", 'name' => "Dashboard"], ['link' => 'admin/seasons', 'name' => "Seasons"]];

    /**
     * @var string[]
     */
    protected $permission = ['index', 'create', 'edit', 'destroy'];

    public function removePhoto(int $id): JsonResponse
    {
        $this->repository->removeImage($id);
        return new JsonResponse('Deleted');
    }
}
