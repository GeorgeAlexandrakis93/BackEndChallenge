<?php

namespace App\Repositories;

use App\Interfaces\VoyageRepositoryInterface;
use App\Models\Voyage;

class VoyageRepository implements VoyageRepositoryInterface 
{

    public function getAllVoyages() 
    {
        return Voyage::all();
    }

    public function getVoyageById($voyageId) 
    {
        return Voyage::findOrFail($voyageId);
    }

    public function deleteVoyage($VoyageId) 
    {
        Voyage::destroy($VoyageId);
    }

    public function createVoyage(array $voyageDetails) 
    {
        return Voyage::create($voyageDetails);
    }

    public function updateVoyage($voyageId, array $newDetails) 
    {
        return Voyage::whereId($voyageId)->update($newDetails);
    }

}