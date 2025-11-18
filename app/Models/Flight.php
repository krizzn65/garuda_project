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
}
