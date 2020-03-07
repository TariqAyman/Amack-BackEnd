<?php
declare(strict_types=1);

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Repositories\SchoolRepository;
use Illuminate\Http\JsonResponse;

class SchoolsController extends Controller
{
    /** @var SchoolRepository */
    private $SchoolRepository;

    /**
     * SchoolsController constructor.
     * @param SchoolRepository $SchoolRepository
     */
    public function __construct(SchoolRepository $SchoolRepository)
    {
        $this->SchoolRepository = $SchoolRepository;
    }


    public function listSchools(): JsonResponse
    {
        $schools = $this->SchoolRepository->findAll();
        return response()->json($schools, 200);
    }
}
