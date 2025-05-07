<?php

namespace App\Services\Product;

use Illuminate\Database\Eloquent\Collection;

interface ProductServiceInterface
{
    public function getProducts(): Collection;
}
