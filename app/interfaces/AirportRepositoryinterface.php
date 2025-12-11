<?php

namespace App\Interfaces;

interface AirportRepositoryinterface
{
    public function getAllAirports();

    public function getAirportBySlug($slug);

    public function getAirportByIataCode($iataCode);
}