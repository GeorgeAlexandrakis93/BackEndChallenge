<?php

namespace App\Http\Controllers;

use App\Interfaces\VoyageRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class VoyageController extends Controller 
{
    private VoyageRepositoryInterface $voyageRepository;

    public function __construct(VoyageRepositoryInterface $voyageRepository) 
    {
        $this->voyageRepository = $voyageRepository;
    }

    public function index(): JsonResponse 
    {
        return response()->json([
            'data' => $this->voyageRepository->getAllVoyages()
        ]);
    }

    public function store(Request $request): JsonResponse 
    {
        $voyageDetails = $request->only([
            'vessel_id',
            'code',
            'start',
            'end',
            'revenues',
            'expenses'
        ]);

        return response()->json(
            [
                'data' => $this->voyageRepository->createVoyage($voyageDetails)
            ],
            Response::HTTP_CREATED
        );
    }

}