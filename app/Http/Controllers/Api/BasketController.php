<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddToBasketRequest;
use App\Http\Resources\BasketResource;
use App\Services\Basket\BasketService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class BasketController extends Controller
{

    public function __construct(protected BasketService $basketService)
    {
    }

    public function add(AddToBasketRequest $request): JsonResponse
    {
        try {
            $validated = $request->validated();
            $this->basketService->add($validated['product_id'], $validated['quantity'] ?? 1);
            return response()->json(['message' => 'Added to basket']);
        } catch (\Exception $e) {
            Log::error($e->getMessage(), (array)__METHOD__);
            return response()->json(['message' => 'something went wrong']);
        }

    }

    public function remove(int $productId): JsonResponse
    {
        try {
            $this->basketService->remove($productId);
            return response()->json(['message' => 'Product was removed']);
        } catch (\Exception $e) {
            Log::error($e->getMessage(), (array)__METHOD__);
            return response()->json(['message' => 'something went wrong']);
        }
    }

    public function items(): BasketResource
    {
        try {
            $basket = $this->basketService->getItems();
            return (new BasketResource($basket))->additional([
                'success' => true,
                'message' => 'Basket product list',
            ]);
        } catch (\Exception $e) {
            Log::error($e->getMessage(), (array)__METHOD__);
            return response()->json(['message' => 'something went wrong']);
        }
    }

    public function clear(): JsonResponse
    {
        try {
            $this->basketService->clear();
            return response()->json(['message' => 'Basket was cleared']);
        } catch (\Exception $e) {
            Log::error($e->getMessage(), (array)__METHOD__);
            return response()->json(['message' => 'something went wrong']);
        }
    }
}
