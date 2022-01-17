<?php

namespace App\Http\Controllers;

use App\Interfaces\VesselRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class VesselController extends Controller 
{
    private VesselRepositoryInterface $vesselRepository;

    public function __construct(VesselRepositoryInterface $vesselRepository) 
    {
        $this->vesselRepository = $vesselRepository;
    }

    public function index(): JsonResponse 
    {
        return response()->json([
            'data' => $this->vesselRepository->getAllVessels()
        ]);
    }

    public function show(Request $request): JsonResponse 
    {
        $vesselId = $request->route('id');

        return response()->json([
            'data' => $this->vesselRepository->getVesselById($vesselId)
        ]);
    }


}