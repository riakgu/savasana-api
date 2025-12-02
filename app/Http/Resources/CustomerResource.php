<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'phone_number' => $this->phone_number,
            'email' => $this->email,
            'address' => $this->address,
            'notes' => $this->notes,

            'clients_count' => $this->whenCounted('clients'),
            'bookings_count' => $this->whenCounted('bookings'),

            'clients' => $this->whenLoaded('clients', function () {
                return $this->clients->map(function ($client) {
                    return [
                        'id' => $client->id,
                        'name' => $client->name,
                        'type' => $client->type,
                        'gender' => $client->gender,
                    ];
                });
            }),

            'bookings' => $this->whenLoaded('bookings', function () {
                return $this->bookings->map(function ($booking) {
                    return [
                        'id' => $booking->id,
                        'service_name'    => $booking->service?->name,
                        'booking_date' => $booking->booking_date?->format('Y-m-d'),
                        'status' => $booking->status,
                        'total_price' => $booking->total_price,
                    ];
                });
            }),

        ];
    }
}
