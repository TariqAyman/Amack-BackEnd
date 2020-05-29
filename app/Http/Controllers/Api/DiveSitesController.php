<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\DiveSiteRepository;
use App\Http\Resources\DiveSite as DiveSiteResource;

class DiveSitesController extends Controller
{
    /** @var DiveSiteRepository */
    private $diveSiteRepository;

    public function __construct(DiveSiteRepository $diveSiteRepository)
    {
        $this->diveSiteRepository = $diveSiteRepository;
    }


    public function index()
    {
        $sites = $this->diveSiteRepository->search(request());
        return DiveSiteResource::collection($sites);
    }
}
