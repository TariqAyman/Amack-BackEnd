<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\DayTime;
use App\Http\Resources\DiveActivity;
use App\Http\Resources\DiveEntry;
use App\Http\Resources\Season;
use App\Http\Resources\Taxon;
use App\Repositories\DayTimeRepository;
use App\Repositories\DiveActivityRepository;
use App\Repositories\DiveEntryRepository;
use App\Repositories\DiveSiteRepository;
use App\Repositories\SeasonRepository;
use App\Repositories\TaxonRepository;

class FilterController extends ApiController
{
    /** @var DiveSiteRepository */
    private $diveSiteRepository;

    /** @var DiveActivityRepository */
    private $diveActivityRepository;
    /**
     * @var TaxonRepository
     */
    private $taxonRepository;
    /**
     * @var SeasonRepository
     */
    private $seasonRepository;
    /**
     * @var DayTimeRepository
     */
    private $dayTimeRepository;
    /**
     * @var DiveEntryRepository
     */
    private $diveEntryRepository;

    public function __construct(DiveSiteRepository $diveSiteRepository,
                                DiveActivityRepository $diveActivityRepository,
                                TaxonRepository $taxonRepository,
                                SeasonRepository $seasonRepository,
                                DayTimeRepository $dayTimeRepository,
                                DiveEntryRepository $diveEntryRepository)
    {
        $this->diveSiteRepository = $diveSiteRepository;
        $this->diveActivityRepository = $diveActivityRepository;
        $this->taxonRepository = $taxonRepository;
        $this->seasonRepository = $seasonRepository;
        $this->dayTimeRepository = $dayTimeRepository;
        $this->diveEntryRepository = $diveEntryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return string
     */
    public function index()
    {
        $taxons = $this->taxonRepository->getModel()::select('id', 'name', 'photo')->orderBy('name', 'desc')->get();
        $seasons = $this->seasonRepository->getModel()::select('id', 'name')->orderBy('name', 'desc')->get();
        $dayTimes = $this->dayTimeRepository->getModel()::select('id', 'name')->orderBy('name', 'desc')->get();
        $activities = $this->diveActivityRepository->getModel()::select('id', 'name')->get();
        $diveEntry = $this->diveEntryRepository->getModel()::select('id', 'name')->get();

        $data = [
            'activity' => DiveActivity::collection($activities),
            'site_entry' => DiveEntry::collection($diveEntry),
            'dive_time' => DayTime::collection($dayTimes),
            'site_type' => Taxon::collection($taxons),
            'seasons' => Season::collection($seasons),
        ];

        return $this->success($data);
    }

}
