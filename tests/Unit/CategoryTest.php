<?php

namespace Tests\Unit;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test  */
    public function it_has_expected_columns(): void
    {
        $this->assertTrue(
            Schema::hasColumns('categories', [
                'id', 'name', 'description', 'parent_id'
            ])
        );
    }

    /** @test  */
    public function it_can_add_a_product()
    {
        $category = Category::factory()->create();
        $product = Product::factory()->create();

        $category->products()->attach($product);

        $this->assertDatabaseHas('category_product', [
            'category_id' => $category->id,
            'product_id' => $product->id
        ]);
    }
}
