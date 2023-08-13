<?php

namespace Database\Factories;

use App\Models\Attribute;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Attribute>
 */
class AttributeFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => Attribute::ATTRIBUTES[array_rand(Attribute::ATTRIBUTES)],
            'product_id' => Product::factory(),
        ];
    }
}
