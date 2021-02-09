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
        $data = Course::query()->select(['id', 'name', 'school_id', 'license_type'])->with('school:id,name');
        return Datatables::of($data)
            ->addColumn('options', function (Course $course) {
                $options = '';
                if (\Auth::user()->can('courses.edit')) {
                    $options = '<a href="' . route('courses.edit', $course->id) . '" class="item-edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit font-medium-4"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg></a>';
                }
                if (\Auth::user()->can('courses.destroy')) {
                    $options .= '<a onclick="deleteItem(' . $course->id . ')" class="item-delete ml-lg-1"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle font-medium-4"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg></a>';
                }
                return $options;
            })
            ->addColumn('school', function (Course $course) {
                return $course->school->name;
            })
            ->rawColumns(['options'])
            ->make(true);
    }
}
