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
route::get('flight/booking/{flightNumber}/passeger-details', [BookingController::class, 'passegerDetails'])->name('booking.passegerDetails');
route::post('flight/booking/{flightNumber}/save-passeger-details', [BookingController::class, 'savePassegerDetails'])->name('booking.savePassegerDetails');
route::get('flight/booking/{flightNumber}/checkout', [BookingController::class, 'checkout'])->name('booking.checkout');
route::post('flight/booking/{flightNumber}/payment', [BookingController::class, 'payment'])->name('booking.payment');
route::get('/booking-success', [BookingController::class, 'success'])->name('booking.success');
Route::get('/booking/check-booking', [BookingController::class, 'checkBooking'])->name('booking.check');
