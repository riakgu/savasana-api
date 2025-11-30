<?php

namespace App\Models;

use App\Enums\BookingSource;
use App\Enums\BookingStatus;
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
        'scheduled_at',
        'duration_minutes',
        'status',
        'source',
        'price',
        'payment_status',
        'notes',
    ];

    protected $casts = [
        'scheduled_at'   => 'datetime',
        'price'          => 'integer',
        'duration_minutes' => 'integer',
        'status'         => BookingStatus::class,
        'source'         => BookingSource::class,
        'payment_status' => PaymentStatus::class,
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
