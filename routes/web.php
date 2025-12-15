<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\BookingController;
use App\Interfaces\FlightRepositoryInterface;



Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/flights', [FlightController::class, 'index'])->name('flight.index');
Route::get('/flights/{flightNumber}/choose-tier', [FlightController::class, 'show'])->name('flight.show');
route::get('flight/booking/{flightNumber}', [BookingController::class, 'booking'])->name('booking');
route::get('flight/booking/{flightNumber}/choose-seat', [BookingController::class, 'chooseSeat'])->name('booking.chooseSeat');
route::post('flight/booking/{flightNumber}/confirm-seat', [BookingController::class, 'confirmSeat'])->name('booking.confirmSeat');
route::post('flight/booking/{flightNumber}/passeger-details', [BookingController::class, 'passegerDetails'])->name('booking.passegerDetails');
Route::get('/booking/check-booking', [BookingController::class, 'checkBooking'])->name('booking.check');
