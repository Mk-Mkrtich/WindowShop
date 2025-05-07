<?php

namespace App\Services\Order;

use App\Models\Order;
use App\Services\Product\ProductService;
use App\Services\Tax\CalculationContext;
use Illuminate\Database\Eloquent\Collection;

class OrderService implements OrderServiceInterface
{

    private $user;

    public function __construct(private Order $orderModel, private ProductService $productService)
    {
        $this->user = auth()->user();
    }

    public function order(array $productIds): Order
    {
        $calc = new CalculationContext($this->user);

        $products = $this->productService->getManyByIDs($productIds);
        $order = $this->orderModel->create(['user_id' => $this->user->id]);
        foreach ($products as $product) {
            $priceWithCalc = $calc->calculate($product->price);
            $order->products()->attach($product->id, ['price_at_order' => $priceWithCalc]);
        }

        return $order;
    }

    public function get(): Collection
    {
        return $this->orderModel
            ->where('user_id', $this->user->id)
            ->with('products')
            ->get();
    }
}
