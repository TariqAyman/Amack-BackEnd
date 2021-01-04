<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Repositories\CenterRepository;
use App\Repositories\CityRepository;
use App\Repositories\SchoolRepository;
use App\Repositories\StaffRepository;
use Illuminate\View\View;

class StaffController extends AdminController
{
    protected $block = 'staff';

    /** @var SchoolRepository */
    protected $repository = StaffRepository::class;
    /**
     * @var CenterRepository
     */
    private $centerRepository;


    public function __construct(CenterRepository $centerRepository)
    {
        parent::__construct();
        $this->centerRepository = $centerRepository;
    }

    public function edit(int $id): View
    {
        $data = $this->repository->find($id);
        $centers = $this->centerRepository->getModel()::pluck('name', 'id');

        return view('admin.' . $this->block . '.form', compact('data', 'centers'));
    }

    public function create(): View
    {
        $centers = $this->centerRepository->getModel()::pluck('name', 'id');
        return view('admin.' . $this->block . '.form', compact('centers'));
    }
}
