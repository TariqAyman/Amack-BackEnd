<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Models\DayTime;
use Illuminate\Http\JsonResponse;

class DayTimesController extends ApiController
{
    /**
     * @return string
     */
    public function index(): string
    {
        $dayTimes = DayTime::query()
            ->select('id', 'name')
            ->orderBy('name', 'desc')
            ->get();
        return $this->success(new JsonResponse($dayTimes));
    }
}
