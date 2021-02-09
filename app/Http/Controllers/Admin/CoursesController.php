<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Repositories\CourseRepository;
use App\Repositories\SchoolRepository;
use Illuminate\View\View;

class CoursesController extends AdminController
{
    protected $block = 'courses';

    /** @var CourseRepository */
    protected $repository = CourseRepository::class;

    /** @var SchoolRepository */
    protected $schoolsRepository;

    protected $indexBreadcrumbs = [['link' => "admin/dashboard", 'name' => "Dashboard"], ['link' => 'admin/dive-sites', 'name' => "Dive Site"]];

    /**
     * @var string[]
     */
    protected $permission = ['index', 'create', 'edit', 'destroy'];

    public function __construct(SchoolRepository $schoolsRepository)
    {
        $this->schoolsRepository = $schoolsRepository;
        parent::__construct();
    }


    public function create(): View
    {
        $schools = $this->schoolsRepository->findAll(['id', 'name']);
        $licenses = $this->repository->findAll(['id', 'name']);
        $breadcrumbs = $this->createBreadcrumbs = array_merge($this->indexBreadcrumbs, [['name' => "Create New"]]);
        return view('admin.' . $this->block . '.form', compact('schools', 'licenses', 'breadcrumbs'));
    }

    public function edit(int $id): View
    {
        $data = $this->repository->find($id);
        $schools = $this->schoolsRepository->findAll(['id', 'name']);
        $licenses = $this->repository->findAll(['id', 'name']);
        $breadcrumbs = $this->editBreadcrumbs = array_merge($this->indexBreadcrumbs, [['name' => "Edit #{$data->id}"]]);
        return view('admin.' . $this->block . '.form', compact('data', 'schools', 'licenses', 'breadcrumbs'));
    }
}
