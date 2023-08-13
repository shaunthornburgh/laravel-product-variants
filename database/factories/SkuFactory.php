<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Sku;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Sku>
 */
class SkuFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'product_id' => Product::factory(),
            'sku' => str()->random(8),
            'unit_amount' => $this->faker->randomFloat(2, 20, 100),
        ];
    }
}
