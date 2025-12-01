<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\StoreClientRequest;
use App\Http\Resources\ClientResource;
use App\Models\Client;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function store(StoreClientRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $client = Client::create($validated);

        return response()->json([
            'data' => new ClientResource($client)
        ]);
    }

    public function show(Client $client): JsonResponse
    {
        return response()->json([
            'data' => new ClientResource($client)
        ]);
    }
}
