<?php

namespace App\Models;

use App\Enums\ServiceTarget;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'duration',
        'price',
        'target',
        'is_active',
    ];

    protected $casts = [
        'duration' => 'integer',
        'price' => 'decimal:2',
        'is_active' => 'boolean',
        'target' => ServiceTarget::class,
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

}
