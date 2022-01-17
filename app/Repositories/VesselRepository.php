<?php

namespace App\Repositories;

use App\Interfaces\VesselRepositoryInterface;
use App\Models\Vessel;

class VesselRepository implements VesselRepositoryInterface 
{

    public function getAllVessels() 
    {
        return Vessel::all();
    }

    public function getVesselById($vesselId) 
    {
        return Vessel::findOrFail($vesselId);
    }


}