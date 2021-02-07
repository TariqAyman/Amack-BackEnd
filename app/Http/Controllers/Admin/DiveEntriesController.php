<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Repositories\DiveEntryRepository;
use Illuminate\Http\JsonResponse;

class DiveEntriesController extends AdminController
{
    protected $block = 'dive-entries';

    /** @var DiveEntryRepository */
    protected $repository = DiveEntryRepository::class;

    protected $indexBreadcrumbs = [['link' => "admin/dashboard", 'name' => "Dashboard"], ['link' => 'admin/dive-entries', 'name' => "Dive entries"]];

    public function removePhoto(int $id): JsonResponse
    {
        $this->repository->removeImage($id);
        return new JsonResponse('Deleted');
    }
}
