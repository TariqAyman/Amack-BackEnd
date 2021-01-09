<?php

namespace App\Http\Controllers\Api;

use App\Repositories\DayTimeRepository;

class SettingsController extends ApiController
{
    /**
     * @var DayTimeRepository
     */
    private $dayTimeRepository;

    /**
     * SettingsController constructor.
     * @param DayTimeRepository $dayTimeRepository
     */
    public function __construct(DayTimeRepository $dayTimeRepository)
    {
        $this->dayTimeRepository = $dayTimeRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return string
     */
    public function index()
    {
        return $this->success([
            'option_dive' => [
                'shore' => [
                    'oxygen' => $this->getOxygen(),
                    'time' => $this->getDayTime(),
                ],
                'boat' => [
                    'dives' => $this->getBoatDives(),
                    'oxygen' => $this->getOxygen(),
                ]
            ]
        ]);
    }

    public function getDayTime()
    {
        $dayTimes = $this->dayTimeRepository->getModel()::pluck('name', 'id');

        $times = [];
        foreach ($dayTimes as $index => $time) {
            $times[] = [
                'key' => $index,
                'value' => $time
            ];
        }
        return $times;
    }

    public function getOxygen()
    {
        return [
            [
                'key' => 'air',
                'value' => 'Air'
            ],
            [
                'key' => 'nitrox',
                'value' => 'Nitrox'
            ],
        ];
    }

    public function getBoatDives()
    {
        return [
            [
                'key' => '2_dives_on_boat',
                'value' => '2  Dives On Boat'
            ],
            [
                'key' => '3_dives_on_boat',
                'value' => '3  Dives On Boat'
            ],
        ];
    }
}
