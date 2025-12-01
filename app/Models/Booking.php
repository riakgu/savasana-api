<?php

namespace App\Models;

use App\Enums\BookingStatus;
use App\Enums\PaymentMethod;
use App\Enums\PaymentStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'customer_id',
        'client_id',
        'service_id',
        'booking_date',
        'booking_time',
        'status',
        'total_price',
        'payment_status',
        'payment_method',
        'notes',
    ];

    protected $casts = [
        'booking_date' => 'date',
        'booking_time' => 'datetime:H:i',
        'total_price' => 'decimal:2',
        'status' => BookingStatus::class,
        'payment_status' => PaymentStatus::class,
        'payment_method' => PaymentMethod::class,
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

}
