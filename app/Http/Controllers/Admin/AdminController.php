<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Repository;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\View\View;

abstract class AdminController extends Controller
{
    /** @var Repository */
    protected $repository;

    protected $block;

    /**
     * @var array
     */
    protected $indexBreadcrumbs = [];

    /**
     * @var array
     */
    protected $editBreadcrumbs;

    /**
     * @var array
     */
    protected $createBreadcrumbs;

    /**
     * AdminController constructor.
     */
    public function __construct()
    {
        $current = $this->block;
        view()->share('current', $current);
        $this->repository = app($this->repository);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|View
     */
    public function index()
    {
        return view('admin.' . $this->block . '.index', ['breadcrumbs' => $this->indexBreadcrumbs]);
    }

    /**
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function show(int $id)
    {
        return $this->repository->find($id);
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|View
     */
    public function edit(int $id)
    {
        $data = $this->repository->find($id);
        $this->editBreadcrumbs = array_merge($this->indexBreadcrumbs, [['name' => "Edit #{$data->id}"]]);
        return view('admin.' . $this->block . '.form', ['data' => $data, 'breadcrumbs' => $this->editBreadcrumbs]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|View
     */
    public function create()
    {
        $this->createBreadcrumbs = array_merge($this->indexBreadcrumbs, [['name' => "Create New"]]);
        return view('admin.' . $this->block . '.form', ['breadcrumbs' => $this->createBreadcrumbs]);
    }

    /**
     * @return mixed
     */
    public function data()
    {
        return $this->repository->getDatatable();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->repository->insert($request->all());
        return redirect(route($this->block . '.index'))->with('status', 'Added Successfully!');
    }

    /**
     * @param int $id
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(int $id, Request $request)
    {
        $this->repository->update($id, $request->all());
        return redirect(route($this->block . '.edit', $id))->with('status', 'Updated Successfully!');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(int $id)
    {
        $this->repository->delete($id);
        return response()->json('Deleted Successfully');
    }
}
