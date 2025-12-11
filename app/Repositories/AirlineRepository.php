<?php

namespace App\Repositories;

use App\Interfaces\AirlinesRepositoryinterface;
use App\Models\Airline;

class AirlineRepository implements AirlinesRepositoryinterface
{
    public function getAllAirlines()
    {
        return Airline::all();
    }
}