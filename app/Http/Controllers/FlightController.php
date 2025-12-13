<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\AirlinesRepositoryInterface;
use App\Interfaces\FlightRepositoryInterface;

class FlightController extends Controller
{
    private AirportRepositoryInterface $airportRepository;
    private AirlinesRepositoryInterface $airlineRepository;
    private FlightRepositoryInterface $flightRepository;

    public function __construct(AirportRepositoryInterface $airportRepository, AirlinesRepositoryInterface $airlineRepository, FlightRepositoryInterface $flightRepository)
    {
        $this->airportRepository = $airportRepository;
        $this->airlineRepository = $airlineRepository;
        $this->flightRepository = $flightRepository;
    }
    function index(Request $request)
    {
        $departure = $this->airportRepository->getAirportByIataCode($request->departure);
        $arrival = $this->airportRepository->getAirportByIataCode($request->arrival);
        
        $flights = $this->flightRepository->getAllFlights([
        'departure' => $departure->id ?? null, 
        'arrival' => $arrival->id ?? null, 
        'date' => $request->date ?? null]);

        $airlines = $this->airlineRepository->getAllAirlines();
        
        return view('pages.flight.index', compact('flights', 'airlines'));
    }
}
