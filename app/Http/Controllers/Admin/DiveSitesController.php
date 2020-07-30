<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Repositories\CityRepository;
use App\Repositories\CourseRepository;
use App\Repositories\DayTimeRepository;
use App\Repositories\DiveActivityRepository;
use App\Repositories\DiveEntryRepository;
use App\Repositories\DiveSiteRepository;
use App\Repositories\SeasonRepository;
use App\Repositories\TaxonRepository;
use Illuminate\View\View;

class DiveSitesController extends AdminController
{
    protected $block = 'dive-sites';

    /** @var DiveSiteRepository */
    protected $repository = DiveSiteRepository::class;

    /** @var CityRepository */
    protected $cityRepository;

    /** @var TaxonRepository */
    protected $taxonRepository;

    /** @var DiveEntryRepository */
    protected $diveEntryRepository;

    /** @var DiveActivityRepository */
    protected $diveActivityRepository;

    /** @var DayTimeRepository */
    protected $datTimeRepository;

    /** @var SeasonRepository */
    protected $seasonRepository;


    /** @var CourseRepository */
    protected $courseRepository;


    public function __construct(CityRepository $cityRepository, TaxonRepository $taxonRepository, DiveEntryRepository $diveEntryRepository, DiveActivityRepository $diveActivityRepository, DayTimeRepository $datTimeRepository, SeasonRepository $seasonRepository, CourseRepository $courseRepository)
    {
        $this->cityRepository = $cityRepository;
        $this->taxonRepository = $taxonRepository;
        $this->diveEntryRepository = $diveEntryRepository;
        $this->diveActivityRepository = $diveActivityRepository;
        $this->datTimeRepository = $datTimeRepository;
        $this->seasonRepository = $seasonRepository;
        $this->courseRepository = $courseRepository;
        parent::__construct();
    }


    public function create(): View
    {
        $seasons = $this->seasonRepository->findAll(['id', 'name']);
        $cities = $this->cityRepository->findBy(['is_dive' => 1], ['id', 'name']);
        $taxons = $this->taxonRepository->findAll(['id', 'name']);
        $activities = $this->diveActivityRepository->findAll(['id', 'name']);
        $licenses = $this->courseRepository->findAll(['id', 'name']);
        $entries = $this->diveEntryRepository->findAll(['id', 'name']);
        $dayTimes = $this->datTimeRepository->findAll(['id', 'name']);
        return view('admin.' . $this->block . '.form', compact('seasons', 'cities', 'taxons', 'activities', 'licenses', 'entries', 'dayTimes'));
    }

    public function edit(int $id): View
    {
        $data = $this->repository->find($id);
        $seasons = $this->seasonRepository->findAll(['id', 'name']);
        $cities = $this->cityRepository->findBy(['is_dive' => 1], ['id', 'name']);
        $taxons = $this->taxonRepository->findAll(['id', 'name']);
        $activities = $this->diveActivityRepository->findAll(['id', 'name']);
        $licenses = $this->courseRepository->findAll(['id', 'name']);
        $entries = $this->diveEntryRepository->findAll(['id', 'name']);
        $dayTimes = $this->datTimeRepository->findAll(['id', 'name']);
        return view('admin.' . $this->block . '.form', compact('data', 'seasons', 'cities', 'taxons', 'activities', 'licenses', 'entries', 'dayTimes'));
    }
}
