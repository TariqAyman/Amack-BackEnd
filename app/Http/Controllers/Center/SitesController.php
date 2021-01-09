<?php

namespace App\Http\Controllers\Center;

use App\Http\Controllers\Controller;
use App\Models\Center;
use App\Repositories\CenterRepository;
use App\Repositories\DiveSiteRepository;
use Illuminate\Http\Request;

class SitesController extends Controller
{
    /**
     * @var CenterRepository
     */
    private $centerRepository;

    /**
     * @var DiveSiteRepository
     */
    private $diveSiteRepository;

    /**
     * SitesController constructor.
     * @param CenterRepository $centerRepository
     */
    public function __construct(DiveSiteRepository $diveSiteRepository, CenterRepository $centerRepository)
    {
        $this->centerRepository = $centerRepository;
        $this->diveSiteRepository = $diveSiteRepository;
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function show($id)
    {
        $site = $this->diveSiteRepository->find($id);
        $center = auth()->user()->center;
        if (!$center->diveSites->find($site->id)) return redirect()->back()->withErrors(trans('app.allow_this_site_first'));

        return view('center.dive_site.index', compact('site', 'center'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->centerRepository->updateCustomSiteInfo((int) $id, $request->except(['_method', '_token']));
        return redirect()->back()->withSuccess(trans('app.success'));
    }
}
