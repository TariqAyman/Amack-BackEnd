<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\SaveForLaterResource;
use App\Repositories\SaveForLaterRepository;
use Illuminate\Http\Request;

class SaveForLaterController extends ApiController
{
    /**
     * @var SaveForLaterRepository
     */
    private $saveForLaterRepository;

    /**
     * SaveForLaterController constructor.
     * @param SaveForLaterRepository $saveForLaterRepository
     */
    public function __construct(SaveForLaterRepository $saveForLaterRepository)
    {
        $this->saveForLaterRepository = $saveForLaterRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return string
     */
    public function index()
    {
        $data = $this->saveForLaterRepository->getMySavedList();
        $list = [];
        foreach ($data as $index => $hashed){
            $list[$index] = SaveForLaterResource::collection($hashed);
        }
        return $this->success($list);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return string
     */
    public function store(Request $request)
    {
        $this->validator($request, [
            'sites' => 'required',
        ]);
        $this->saveForLaterRepository->create($request->all());
        return $this->success();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $hash
     * @return string
     */
    public function destroy($hash)
    {
        $this->saveForLaterRepository->deleteByHash($hash);
        return $this->success();
    }
}
