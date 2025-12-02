<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource
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
            'customer_id' => $this->customer_id,
            'name' => $this->name,
            'type' => $this->type,
            'birthdate' => $this->birthdate?->format('Y-m-d'),
            'gender' => $this->gender,
            'notes' => $this->notes,

            'bookings_count' => $this->whenCounted('bookings'),

            'customer' => $this->whenLoaded('customer', fn() => [
                'id' => $this->customer->id,
                'name' => $this->customer->name,
                'phone' => $this->customer->phone_number,
            ]),

            'bookings' => $this->whenLoaded('bookings', function () {
                return $this->bookings->map(function ($booking) {
                    return [
                        'id'           => $booking->id,
                        'service_name'    => $booking->service?->name,
                        'booking_date' => $booking->booking_date?->format('Y-m-d'),
                        'status'       => $booking->status,
                        'total_price'  => $booking->total_price,
                    ];
                });
            }),

        ];
    }
}
