<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Booking\StoreBookingRequest;
use App\Http\Requests\Booking\UpdateBookingRequest;
use App\Http\Resources\BookingResource;
use App\Models\Booking;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function store(StoreBookingRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $booking = Booking::create($validated);

        return response()->json([
            'data' => new BookingResource($booking)
        ], 201);
    }

    public function show(Booking $booking): JsonResponse
    {
        return response()->json([
            'data' => new BookingResource($booking)
        ]);
    }

    public function update(UpdateBookingRequest $request, Booking $booking): JsonResponse
    {
        $validated = $request->validated();

        $booking->update($validated);

        return response()->json([
            'data' => new BookingResource($booking)
        ]);
    }

    public function index()
    {
        $bookings = Booking::orderBy('created_at', 'desc')
            ->paginate(10);

        return BookingResource::collection($bookings);
    }

    public function complete(Booking $booking): JsonResponse
    {
        $booking->update(['status' => 'completed']);

        return response()->json([
            'data' => new BookingResource($booking)
        ]);
    }

    public function cancel(Booking $booking): JsonResponse
    {
        $booking->update(['status' => 'cancelled']);

        return response()->json([
            'data' => new BookingResource($booking)
        ]);
    }

    public function markAsPaid(Request $request, Booking $booking): JsonResponse
    {
        $request->validate([
            'payment_method' => ['required', 'in:cash,transfer']
        ]);

        $booking->update([
            'payment_status' => 'paid',
            'payment_method' => $request->payment_method
        ]);

        return response()->json([
            'data' => new BookingResource($booking)
        ]);
    }

    public function markAsUnpaid(Booking $booking): JsonResponse
    {
        $booking->update([
            'payment_status' => 'unpaid',
            'payment_method' => null
        ]);

        return response()->json([
            'data' => new BookingResource($booking)
        ]);
    }
}
