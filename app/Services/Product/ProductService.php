<?php

namespace App\Services\Product;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

class ProductService implements ProductServiceInterface
{
    public function __construct(private Product $productModel)
    {
    }

    public function getProducts(): Collection
    {
        return $this->productModel->get();
    }

    public function getManyByIDs(array $productIds): Collection
    {
        return $this->productModel->findMany($productIds);
    }

}
