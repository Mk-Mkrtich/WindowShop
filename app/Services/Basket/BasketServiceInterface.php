<?php

namespace App\Services\Basket;

interface BasketServiceInterface
{
    public function add(int $productId, int $quantity = 1): void;

    public function remove(int $productId): void;

    public function getItems(): array;

    public function clear(): void;

}
