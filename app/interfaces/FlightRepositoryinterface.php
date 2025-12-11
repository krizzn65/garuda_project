<?php

namespace App\Interfaces;

interface FlightRepositoryinterface
{
    public function getAllFlights($filter = null);

    public function getFlightByFlightNumber($flightNumber);
}