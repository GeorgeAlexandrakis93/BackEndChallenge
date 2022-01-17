<?php

namespace App\Repositories;

use App\Interfaces\Voyage_OpexRepositoryInterface;
use App\Models\Voyage_Opex;

class Voyage_OpexRepository implements Voyage_OpexRepositoryInterface 
{

    public function createVoyage_Opex(array $voyage_opexDetails) 
    {
        return Voyage_Opex::create($voyage_opexDetails);
    }

}