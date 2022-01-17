<?php

namespace App\Interfaces;

interface VoyageRepositoryInterface 
{

    public function getAllVoyages();
    public function getVoyageById($voyageId);
    public function deleteVoyage($voyageId);
    public function createVoyage(array $voyageDetails);
    public function updateVoyage($voyageId, array $newDetails);

}