<?php

namespace App\Repositories;

use App\Interfaces\AirlinesRepositoryInterface;
use App\Models\Airline;

class AirlineRepository implements AirlinesRepositoryInterface
{
    public function getAllAirlines()
    {
        return Airline::all();
    }
}