<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use hasFactory, SoftDeletes;

    protected $fillable = [

        'code',
        'flight_id',
        'flight_class_id',
        'name',
        'email',
        'phone',
        'number_of_passengers',
        'promo_code_id',
        'payment_status',
        'sub_total',
        'grand_total',
    ];

    public function flight()
    {
        return $this->belongsTo(Flight::class);
    }

    public function Class()
    {
        return $this->belongsTo(FlightClass::class);
    }

    public function promoCode()
    {
        return $this->belongsTo(PromoCode::class);
    }

    public function passengers()
    {
        return $this->hasMany(TransactionPassenger::class);
    }
}
