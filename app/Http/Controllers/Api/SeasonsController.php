<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Season;
use Illuminate\Http\JsonResponse;

class SeasonsController extends Controller
{
    public function index(): JsonResponse
    {
        $seasons = Season::query()->select('id', 'name')->orderBy('name', 'desc')->get();
        return new JsonResponse($seasons);
    }
}
