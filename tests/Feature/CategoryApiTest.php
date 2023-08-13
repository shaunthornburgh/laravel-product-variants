<?php

namespace Tests\Feature;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryApiTest extends TestCase
{
    use WithFaker;
    use RefreshDatabase;

    /** @test */
    public function a_user_can_view_categories(): void
    {
        $this->get(route('category.index'))
            ->assertStatus(200);
    }

    /** @test */
    public function a_user_can_view_a_category(): void
    {
        $category = Category::factory()->create();

        $this->get(route('category.show', [
            'category' => $category->id
        ]))
            ->assertStatus(200)
            ->assertJson([
                'data' => [
                    'id' => $category->id,
                    'name' => $category->name,
                    'description' => $category->description
                ]
            ]);
    }
}
