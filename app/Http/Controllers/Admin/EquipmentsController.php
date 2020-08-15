<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Repositories\EquipmentRepository;
use App\Repositories\SeasonRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class EquipmentsController extends AdminController
{
    protected $block = 'equipments';

    /** @var EquipmentRepository */
    protected $repository = EquipmentRepository::class;

    /** @var SeasonRepository */
    protected $seasonRepository;

    public function __construct(SeasonRepository $seasonRepository)
    {
        $this->seasonRepository = $seasonRepository;
        parent::__construct();
    }


    public function removePhoto(int $id): JsonResponse
    {
        $this->repository->removeImage($id);
        return new JsonResponse('Deleted');
    }

    public function create(): View
    {
        $seasons = $this->seasonRepository->findAll(['id', 'name']);
        return view('admin.' . $this->block . '.form', compact('seasons'));
    }

    public function edit(int $id): View
    {
        $data = $this->repository->find($id);
        $seasons = $this->seasonRepository->findAll(['id', 'name']);
        return view('admin.' . $this->block . '.form', compact('data', 'seasons'));
    }
}
