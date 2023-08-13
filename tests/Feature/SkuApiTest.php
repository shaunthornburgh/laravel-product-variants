<?php

namespace Tests\Feature;

use App\Models\Attribute;
use App\Models\Sku;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SkuApiTest extends TestCase
{
    use WithFaker;
    use RefreshDatabase;

    /** @test */
    public function a_user_can_view_skus(): void
    {
        $this->get(route('sku.index'))
            ->assertStatus(200);
    }

    /** @test */
    public function a_user_can_view_a_sku(): void
    {
        $sku = Sku::factory()->create();
        $attribute = Attribute::factory()->create();
        $sku->attributes()->attach($attribute, ['value' => $value = fake()->word]);
        $attributeSku = $attribute->skus()->where('sku_id', $sku->id)->first()->pivot;

        $this->get(route('sku.show', [
                'sku' => $sku->id
            ]))
            ->assertStatus(200)
            ->assertJson([
                'data' => [
                    'id' => $sku->id,
                    'unit_amount' => $sku->unit_amount
                ]
            ])
            ->assertJsonFragment([
                'pivot' => [
                    'sku_id' => $sku->id,
                    'id' => $attributeSku->id,
                    'attribute_id' => $attribute->id,
                    'value' => $value
                ]
            ]);
    }
}
