<?php

namespace App\Http\Controllers\Center;

use App\Http\Controllers\Controller;
use App\Repositories\DiveSiteRepository;
use Illuminate\Http\Request;

class SitesController extends Controller
{
    /**
     * @var DiveSiteRepository
     */
    private $diveSiteRepository;

    /**
     * SitesController constructor.
     * @param DiveSiteRepository $diveSiteRepository
     */
    public function __construct(DiveSiteRepository $diveSiteRepository)
    {
        $this->diveSiteRepository = $diveSiteRepository;
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $site = $this->diveSiteRepository->find($id);

        return view('center.dive_site.index', compact('site'));
    }
}
