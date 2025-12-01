<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Booking\StoreBookingRequest;
use App\Http\Resources\BookingResource;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function store(StoreBookingRequest $request)
    {
        $validated = $request->validated();

        $booking = Booking::create($validated);

        return response()->json([
            'data' => new BookingResource($booking)
        ], 201);
    }

    public function show(Booking $booking)
    {
        return response()->json([
            'data' => new BookingResource($booking)
        ]);
    }
}
