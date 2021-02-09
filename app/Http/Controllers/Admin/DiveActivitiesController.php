<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Repositories\DiveActivityRepository;
use Illuminate\Http\JsonResponse;

class DiveActivitiesController extends AdminController
{
    protected $block = 'dive-activities';

    protected $repository = DiveActivityRepository::class;

    protected $indexBreadcrumbs = [['link' => "admin/dashboard", 'name' => "Dashboard"], ['link' => 'admin/dive-activities', 'name' => "Dive activities"]];

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
