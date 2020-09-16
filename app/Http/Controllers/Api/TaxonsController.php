<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Taxon;
use Illuminate\Http\JsonResponse;

class TaxonsController extends Controller
{
    public function index(): JsonResponse
    {
        $taxons = Taxon::query()
            ->select('id', 'name', 'photo')
            ->orderBy('name', 'desc')->get();
        return new JsonResponse($taxons);
    }
}
