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

    public function __construct(SchoolRepository $schoolsRepository)
    {
        $this->schoolsRepository = $schoolsRepository;
        parent::__construct();
    }


    public function create(): View
    {
        $schools = $this->schoolsRepository->findAll(['id', 'name']);
        $licenses = $this->repository->findAll(['id', 'name']);
        return view('admin.' . $this->block . '.form', compact('schools', 'licenses'));
    }

    public function edit(int $id): View
    {
        $data = $this->repository->find($id);
        $schools = $this->schoolsRepository->findAll(['id', 'name']);
        $licenses = $this->repository->findAll(['id', 'name']);
        return view('admin.' . $this->block . '.form', compact('data', 'schools', 'licenses'));
    }
}
