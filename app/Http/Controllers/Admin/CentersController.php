<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Repositories\CenterRepository;
use App\Repositories\CityRepository;
use App\Repositories\SchoolRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CentersController extends AdminController
{
    protected $block = 'centers';

    /** @var SchoolRepository */
    protected $repository = CenterRepository::class;

    /**
     * @var CityRepository
     */
    private $cityRepository;

    public function __construct(CityRepository $cityRepository)
    {
        parent::__construct();
        $this->cityRepository = $cityRepository;
    }

    public function removeLogo(int $id)
    {
        $this->repository->removeLogo($id);
        return new JsonResponse('Deleted');
    }

    public function create(): View
    {
        $cities = $this->cityRepository->getModel()::pluck('name', 'id');
        $languages = ['Arabic', 'Spanish', 'English', 'Russian', 'Deutsch', 'French', 'Italian'];
        return view('admin.' . $this->block . '.form', compact('cities', 'languages'));
    }

    public function store(Request $request)
    {
        dd($request->all());
        $this->repository->insert($request->all());
        return redirect(route($this->block . '.index'))->with('status', 'Added Successfully!');
    }
}
