<?php

namespace App\Interfaces;

interface VesselRepositoryInterface 
{

    public function getAllVessels();
    public function getVesselById($vesselId);

}