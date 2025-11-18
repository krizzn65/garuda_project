<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FlightSegmen extends Model
{
    use hasFactory, SoftDeletes;

    protected $fillable = [
        'sequence',
        'flight_id',
        'airport_id',
        'time',
    ];

    public function flight()
    {
        return $this->belongsTo(Flight::class);
    }

    public function airport()
    {
        return $this->belongsTo(Airport::class);
    }
}
