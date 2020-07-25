<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Repository;
use Illuminate\Http\Request;
use Illuminate\View\View;

abstract class AdminController extends Controller
{
    /** @var Repository */
    protected $repository;

    protected $block;

    public function __construct()
    {
        $current = $this->block;
        view()->share('current', $current);
        $this->repository = app($this->repository);
    }

    public function index(): View
    {
        return view('admin.' . $this->block . '.index');
    }

    public function show(int $id)
    {
        return $this->repository->find($id);
    }

    public function edit(int $id): View
    {
        $data = $this->repository->find($id);
        return view('admin.' . $this->block . '.form', compact('data'));
    }

    public function create(): View
    {
        return view('admin.' . $this->block . '.form');
    }

    public function data()
    {
        return $this->repository->getDatatable();
    }

    public function store(Request $request)
    {
        $this->repository->insert($request->all());
        return redirect(route($this->block . '.index'))->with('status', 'Added Successfully!');
    }

    public function update(int $id, Request $request)
    {
        $this->repository->update($id, $request->all());
        return redirect(route($this->block . '.edit', $id))->with('status', 'Updated Successfully!');
    }

    public function destroy(int $id)
    {
        $this->repository->delete($id);
        return response()->json('deleted');
    }
}
