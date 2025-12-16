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

    public function savePassegerDetails(StorePassegerDetailRequest $request, $flightNumber){
        $this->transactionRepository->saveTransactionDataToSession($request->all());
        return redirect()->route('booking.checkout', ['flightNumber' => $flightNumber]);
    }

    public function checkout($flightNumber){
        $transaction = $this->transactionRepository->getTransactionDataFromSession();
        $flight = $this->flightRepository->getFlightByNumber($flightNumber);
        $tier = $flight->classes->find($transaction['flight_class_id']);
        return view('pages.booking.checkout', compact('flight', 'tier'));
    }

    public function payment(Request $request){
        $this->transactionRepository->saveTransactionDataToSession($request->all());

        $transaction = $this->transactionRepository->saveTransaction($this->transactionRepository->getTransactionDataFromSession());

        \Midtrans\Config::$serverKey = config('midtrans.serverKey');
        \Midtrans\Config::$isProduction = config('midtrans.isProduction');
        \Midtrans\Config::$isSanitized = config('midtrans.isSanitized');
        \Midtrans\Config::$is3ds = config('midtrans.is3ds');

        $params = [
            'transaction_details' => [
                'order_id' => $transaction->code,
                'gross_amount' => $transaction->grandtotal,
            ],
        ];

        $paymentUrl = \Midtrans\Snap::createTransaction($params)->redirect_url;

        return redirect($paymentUrl);
    }

    public function checkBooking(){
        return view('pages.booking.check-booking');
    }
}
