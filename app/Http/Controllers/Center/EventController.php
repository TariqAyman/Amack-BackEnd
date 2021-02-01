<?php

namespace App\Http\Controllers\Center;

use App\Http\Controllers\Controller;
use App\Repositories\EventsRepository;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * @var EventsRepository
     */
    private $eventsRepository;

    /**
     * EventController constructor.
     * @param EventsRepository $eventsRepository
     */
    public function __construct(EventsRepository $eventsRepository)
    {
        $this->eventsRepository = $eventsRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json(['events' => $this->eventsRepository->myEvent()]);
    }
}
