<?php

namespace App\Http\Controllers\Api;

use App\Repositories\UserContactRepository;
use Illuminate\Http\Request;

class UserContactController extends ApiController
{
    /**
     * @var UserContactRepository
     */
    private $contactRepository;

    /**
     * UserContactController constructor.
     * @param UserContactRepository $contactRepository
     */
    public function __construct(UserContactRepository $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return string
     */
    public function index()
    {
        $users = $this->contactRepository->myContactUser();
        return $this->success($users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return string
     */
    public function store(Request $request)
    {
        $this->validator($request,[
            'mobile' => 'required|array'
        ]);

        $this->contactRepository->create($request->only('mobile'));
        return $this->success(['success']);
    }
}
