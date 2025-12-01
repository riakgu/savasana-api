<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Service\StoreServiceRequest;
use App\Http\Requests\Service\UpdateServiceRequest;
use App\Http\Resources\ServiceResource;
use App\Models\Service;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function store(StoreServiceRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $service = Service::create($validated);

        return response()->json([
            'data' => new  ServiceResource($service),
        ]);
    }

    public function show(Service $service): JsonResponse
    {
        return response()->json([
            'data' => new  ServiceResource($service),
        ]);
    }

    public function update(UpdateServiceRequest $request, Service $service): JsonResponse
    {
        $validated = $request->validated();

        $service->update($validated);

        return response()->json([
            'data' => new  ServiceResource($service),
        ]);
    }
}
