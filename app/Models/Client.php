<?php

namespace App\Models;

use App\Enums\ClientGender;
use App\Enums\ClientType;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{

    protected $fillable = [
        'customer_id',
        'name',
        'type',
        'birthdate',
        'gender',
        'notes',
    ];

    protected $casts = [
        'type' => ClientType::class,
        'gender' => ClientGender::class,
        'birthdate' => 'date',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

}
