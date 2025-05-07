<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $isDigital = $this->faker->boolean;
        return [
            'name' => $isDigital
                ? 'E-Product: ' . $this->faker->words(2, true)
                : 'Physical Product: ' . $this->faker->words(2, true),
            'price' => $this->faker->randomFloat(2, 5, 500),
            'type' => $isDigital
                ? Product::DIGITAL_PRODUCT_TYPE
                : Product::PHYSICAL_PRODUCT_TYPE,
            'meta' => $isDigital
                ? null
                : ['dimension' => '30x20x2 cm']
        ];
    }
}
