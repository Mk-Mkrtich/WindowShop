<?php

namespace App\Services\Basket;

use App\Models\Basket;

class BasketService implements BasketServiceInterface
{

    private $user;
    private $sessionId;

    public function __construct(private Basket $basketModel)
    {
        $this->user = auth()->user();
        $this->sessionId = session()->getId();
        $this->getBasket();
    }

    public function add(int $productId, int|null $quantity = 1): void
    {
        $items = $this->basketModel->items;

        if ($items[$productId] ?? null) {
            $items[$productId]['quantity'] += $quantity;
        } else {
            $items[$productId] = [
                'product_id' => $productId,
                'quantity' => $quantity,
            ];
        }

        $this->basketModel->items = $items;
        $this->basketModel->save();
    }

    public function remove(int $productId): void
    {
        $items = $this->basketModel->items;

        if ($items[$productId] ?? null) unset($items[$productId]);

        $this->basketModel->items = $items;
        $this->basketModel->save();
    }

    public function getItems(): array
    {
        return $this->basketModel->items;
    }

    public function clear(): void
    {
        $this->basketModel->items = [];
        $this->basketModel->save();
    }

    private function getBasket(): void
    {
        $this->basketModel = Basket::firstOrCreate(
            ['session_id' => $this->sessionId],
            ['user_id' => $this->user?->id]
        );

        if ($this->user && is_null($this->basketModel->user_id)) {
            $this->basketModel->update(['user_id' => $this->user->id]);
        }
    }
}
