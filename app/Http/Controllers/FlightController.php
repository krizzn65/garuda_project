<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FlightController extends Controller
{
    function index()
    {
        return view('pages.flight.index');
    }
}
