<?php

namespace App\Http\Controllers;

use App\Interfaces\Voyage_OpexRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class Voyage_OpexController extends Controller 
{
    private Voyage_OpexRepositoryInterface $voyage_opexRepository;

    public function __construct(Voyage_OpexRepositoryInterface $voyage_opexRepository) 
    {
        $this->voyage_opexRepository = $voyage_opexRepository;
    }

    public function index(): JsonResponse 
    {
        return response()->json([
            'data' => $this->voyage_opexRepository->getAllVoyage_Opexes()
        ]);
    }

    public function store(Request $request): JsonResponse 
    {
        $voyage_opexDetails = $request->only([
            'date',
            'expenses'
        ]);

        return response()->json(
            [
                'data' => $this->voyage_opexRepository->createVoyage_Opex($voyage_opexDetails)
            ],
            Response::HTTP_CREATED
        );
    }

}