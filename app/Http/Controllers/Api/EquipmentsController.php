<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\EquipmentResource;
use App\Http\Resources\SitesEquipments;
use App\Repositories\EquipmentRepository;
use Illuminate\Http\Request;

class EquipmentsController extends ApiController
{
    /**
     * @var EquipmentRepository
     */
    private $equipmentRepository;

    /**
     * EquipmentsController constructor.
     * @param EquipmentRepository $equipmentRepository
     */
    public function __construct(EquipmentRepository $equipmentRepository)
    {
        $this->equipmentRepository = $equipmentRepository;
    }

    public function getEquipmentBySitesIds(Request $request)
    {
        $equipments = $this->equipmentRepository->getByIds($request->sites_id);
        $equipments = $equipments->groupBy('state');

        return $this->success([
            'main' => EquipmentResource::collection($equipments['main'] ?? []),
            'extra' => EquipmentResource::collection($equipments['extra'] ?? []),
        ]);
    }
}
