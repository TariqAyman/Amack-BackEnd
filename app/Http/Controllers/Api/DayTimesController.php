<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Models\DayTime;
use Illuminate\Http\JsonResponse;

class DayTimesController
{
    public function index(): JsonResponse
    {
        $dayTimes = DayTime::query()
            ->select('id', 'name')
            ->orderBy('name', 'desc')
            ->get();
        return new JsonResponse($dayTimes);
    }
}
