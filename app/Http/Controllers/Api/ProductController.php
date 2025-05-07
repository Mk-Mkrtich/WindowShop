<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Services\Product\ProductService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ProductController extends Controller
{

    public function __construct(protected ProductService $productService)
    {
    }

    public function items(): AnonymousResourceCollection
    {
        $products = $this->productService->getProducts();
        return ProductResource::collection($products);
    }

}
