<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\OrderRequest;
use App\Http\Resources\OrderResource;
use App\Services\Order\OrderService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Log;


class OrderController
{

    public function __construct(private OrderService $orderService)
    {}

    public function order(OrderRequest $request): JsonResponse
    {
        try {
            $validated = $request->validated();
            $this->orderService->order($validated['product_ids']);
            return response()->json(["message" => 'success']);
        } catch (\Exception $e) {
            Log::error($e->getMessage(), (array)__METHOD__);
            return response()->json(['message' => 'something went wrong']);
        }
    }


    public function get(): AnonymousResourceCollection|JsonResponse
    {
        try {
            return OrderResource::collection($this->orderService->get());
        } catch (\Exception $e) {
            Log::error($e->getMessage(), (array)__METHOD__);
            return response()->json(['message' => 'something went wrong']);
        }
    }
}
