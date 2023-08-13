<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Repositories\CategoryRepositoryInterface;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function __construct(
        private CategoryRepositoryInterface $categoryRepository
    ) {
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clothesCategory = $this->categoryRepository->findByName('Clothes');

        $product = Product::factory()->create([
            'name' => 'T-Shirt'
        ]);

        $clothesCategory->products()->attach($product);
    }
}
