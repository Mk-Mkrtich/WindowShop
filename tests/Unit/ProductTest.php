<?php

namespace Tests\Unit;

use App\Http\Controllers\Api\ProductController;
use App\Http\Resources\ProductResource;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Product;
use App\Services\Product\ProductService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_product_get(): void
    {
        $fakeProducts = new Collection([
            new Product(['id' => 1, 'name' => 'Product 1', 'price' => 12.2, 'type' => 'digital']),
            new Product(['id' => 2, 'name' => 'Product 2', 'price' => 23.4, 'type' => 'digital']),
        ]);

        $mockProductService = \Mockery::mock(ProductService::class);
        $mockProductService->shouldReceive('getProducts')
            ->once()
            ->andReturn($fakeProducts);

        $controller = new ProductController($mockProductService);
        $result = $controller->items();

        $this->assertInstanceOf(AnonymousResourceCollection::class, $result);
    }

    protected function tearDown(): void
    {
        \Mockery::close();
        parent::tearDown();
    }
}
