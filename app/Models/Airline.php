<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Airline extends Model
{
    use hasFactory,softDeletes;

    protected $fillable = [
        'code',
        'name',
        'logo',
    ];
}
