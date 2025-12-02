<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\StoreCustomerRequest;
use App\Http\Requests\Customer\UpdateCustomerRequest;
use App\Http\Resources\BookingResource;
use App\Http\Resources\CustomerResource;
use App\Models\Customer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function store(StoreCustomerRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $customer = Customer::create($validated);

        return response()->json([
            'data' => new CustomerResource($customer),
        ]);
    }

    public function show(Customer $customer): JsonResponse
    {

        return response()->json([
            'data' => new CustomerResource($customer->load('clients')),
        ], 200);
    }

    public function update(UpdateCustomerRequest $request, Customer $customer): JsonResponse
    {
        $validated = $request->validated();
        $customer->update($validated);

        return response()->json([
            'data' => new CustomerResource($customer),
        ]);

    }

    public function index()
    {
        $customers = Customer::withCount('clients', 'bookings')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return CustomerResource::collection($customers);
    }

    public function bookings(Customer $customer)
    {
        $bookings = $customer->bookings()->get()
            ->sortByDesc('created_at');

        return BookingResource::collection($bookings);

    }
}
