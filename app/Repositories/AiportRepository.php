<?php

namespace App\Repositories;

use App\Interfaces\AirportRepositoryinterface;
use App\Models\Airport;

class AiportRepository implements AirportRepositoryinterface
{
    public function getAllAirports()
    {
        return Airport::all();
    }

    public function getAirportBySlug($slug)
    {
        return Airport::where('slug', $slug)->first();
    }

    public function getAirportByIataCode($iataCode)
    {
        return Airport::where('iata_code', $iataCode)->first();
    }
}