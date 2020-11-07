<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DiveActivity;
use Illuminate\Http\JsonResponse;

class DiveActivitiesController extends ApiController
{
    /**
     * @return string
     */
    public function index(): string
    {
        $activities = DiveActivity::query()->select('id', 'name')->get();
        return $this->success(new JsonResponse($activities));
    }
}
