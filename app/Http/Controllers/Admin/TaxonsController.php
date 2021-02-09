<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Repositories\TaxonRepository;
use Illuminate\Http\JsonResponse;

class TaxonsController extends AdminController
{
    protected $block = 'taxons';
    /** @var TaxonRepository */
    protected $repository = TaxonRepository::class;

    protected $indexBreadcrumbs = [['link' => "admin/dashboard", 'name' => "Dashboard"], ['link' => 'admin/taxons', 'name' => "Taxons"]];

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
