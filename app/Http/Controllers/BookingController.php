<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\FlightRepositoryInterface;
use App\Interfaces\TransactionRepositoryInterface;

class BookingController extends Controller
{

    private FlightRepositoryInterface $flightRepository;
    private TransactionRepositoryInterface $transactionRepository;

    public function __construct(FlightRepositoryInterface $flightRepository, TransactionRepositoryInterface $transactionRepository)
    {
        $this->flightRepository = $flightRepository;
        $this->transactionRepository = $transactionRepository;
    }

    public function booking(Request $request, $flightNumber){
       
        $this->transactionRepository->saveTransactionDataToSession($request->all());
        return redirect()->route('booking.chooseSeat', ['flightNumber' => $flightNumber]);
    }

    public function chooseSeat(Request $request, $flightNumber){
        $transaction = $this->transactionRepository->getTransactionDataFromSession();
        $flight = $this->flightRepository->getFlightByNumber($flightNumber);
        $tier = $flight->classes->find($transaction['flight_class_id']);
        return view('pages.booking.choose-seat', compact('flight', 'tier'));
    }

    public function confirmSeat(Request $request, $flightNumber){
        $this->transactionRepository->saveTransactionDataToSession($request->all());
        return redirect()->route('booking.passegerDetails', ['flightNumber' => $flightNumber]);
    }

    public function passegerDetails(Request $request, $flightNumber){
        $transaction = $this->transactionRepository->getTransactionDataFromSession();
        $flight = $this->flightRepository->getFlightByNumber($flightNumber);
        $tier = $flight->classes->find($transaction['flight_class_id']);
        return view('pages.booking.passeger-details', compact('flight', 'tier'));
    }

    public function seatPassegerDetails(StorePassegerDetailRequest $request, $flightNumber){
        $this->transactionRepository->saveTransactionDataToSession($request->all());
        
    }

    public function checkBooking(){
        return view('pages.booking.check-booking');
    }
}
