<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Course;
use Yajra\DataTables\Facades\DataTables;

class CourseRepository extends Repository
{
    public function getModel()
    {
        return Course::class;
    }

    public function getDatatable()
    {
        $data = Course::query()->select(['id', 'name', 'school_id'])->with('school:id,name');
        return Datatables::of($data)
            ->addColumn('options', function (Course $course) {
                $options = '<a href="' . route('courses.edit', $course->id) . '" <i class="fas fa-edit"></i></a>';
                $options .= ' <a onclick="deleteItem(' . $course->id . ')" class="btn btn-danger" href="#"> <i class="fas fa-trash"></i> </a>';

                return $options;
            })
            ->addColumn('school', function (Course $course) {
                return $course->school->name;
            })
            ->rawColumns(['options'])
            ->make(true);
    }
}
