<?php

namespace App\Services\Order;

use App\Models\Order;
use App\Models\User;

interface OrderServiceInterface
{
    public function order(array $productIds): Order;
}
