<?php

namespace App\Models;

use App\Enums\ClientType;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{

    protected $fillable = [
        'customer_id',
        'name',
        'type',
        'birth_date',
        'allergies',
        'medical_notes',
    ];

    protected $casts = [
        'type' => ClientType::class,
        'birth_date' => 'date',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

}
