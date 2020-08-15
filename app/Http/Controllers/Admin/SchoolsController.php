<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Repositories\SchoolRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class SchoolsController extends AdminController
{
    protected $block = 'schools';

    /** @var SchoolRepository */
    protected $repository = SchoolRepository::class;

    public function removeLogo(int $id)
    {
        $this->repository->removeLogo($id);
        return new JsonResponse('Deleted');
    }
}
