<?php

namespace Tests\Unit;

use App\Models\Attribute;
use App\Models\Sku;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class SkuTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test  */
    public function it_has_expected_columns(): void
    {
        $this->assertTrue(
            Schema::hasColumns('skus', [
                'id', 'sku', 'product_id'
            ])
        );
    }

    /** @test  */
    public function it_has_a_product(): void
    {
        $sku = Sku::factory()->create();
        $this->assertEquals($sku->product_id, $sku->product->id);
    }

    /** @test  */
    public function it_can_add_a_product_attribute()
    {
        $sku = Sku::factory()->create();
        $attribute = Attribute::factory()->create();

        $sku->attributes()->attach($attribute, ['value' => $value = $this->faker->name]);

        $this->assertDatabaseHas('attribute_sku', [
            'attribute_id' => $attribute->id,
            'sku_id' => $sku->id,
            'value' => $value
        ]);
    }
}
