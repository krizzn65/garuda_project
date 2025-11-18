<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use hasFactory,softDeletes;

    protected $fillable = [
        'flight_number',
        'airline_id',
    ];

    public function airline()
    {
        return $this->belongsTo(Airline::class);
    }

    public function segments()
    {
        return $this->hasMany(FlightSegmen::class);
    }

    public function classes()
    {
        return $this->hasMany(FlightClass::class);
    }

    public function seats()
    {
        return $this->hasMany(FlightSeat::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
