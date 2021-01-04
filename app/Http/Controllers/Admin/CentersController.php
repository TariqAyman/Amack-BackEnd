<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Models\DiveActivity;
use App\Repositories\CenterRepository;
use App\Repositories\CityRepository;
use App\Repositories\SchoolRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CentersController extends AdminController
{
    protected $block = 'centers';

    /** @var CenterRepository */
    protected $repository = CenterRepository::class;

    /**
     * @var DiveActivity
     */
    private $diveActivity;


    public function __construct(DiveActivity $diveActivity)
    {
        parent::__construct();
        $this->diveActivity = $diveActivity;
    }

    public function removeLogo(int $id)
    {
        $this->repository->removeLogo($id);
        return new JsonResponse('Deleted');
    }

    public function create(): View
    {
        $activities = $this->diveActivity->getModel()::pluck('name', 'id');
        $languages = ['ar' => 'Arabic', 'esp' => 'Spanish', 'en' => 'English', 'ru' => 'Russian', 'deu' => 'Deutsch', 'fra' => 'French', 'ita' => 'Italian'];
        return view('admin.' . $this->block . '.form', compact('activities', 'languages'));
    }

    public function store(Request $request)
    {
        $this->repository->insert($request->all());
        return redirect(route($this->block . '.index'))->with('status', 'Added Successfully!');
    }

    public function edit(int $id): View
    {
        $activities = $this->diveActivity->getModel()::pluck('name', 'id');
        $languages = ['ar' => 'Arabic', 'esp' => 'Spanish', 'en' => 'English', 'ru' => 'Russian', 'deu' => 'Deutsch', 'fra' => 'French', 'ita' => 'Italian'];
        $data = $this->repository->find($id);
        return view('admin.' . $this->block . '.form', compact('data', 'activities', 'languages'));
    }
}
