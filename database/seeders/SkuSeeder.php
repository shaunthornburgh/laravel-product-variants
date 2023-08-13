<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Attribute;
use App\Models\Product;
use App\Models\Sku;
use App\Repositories\ProductRepositoryInterface;
use Illuminate\Database\Seeder;

class SkuSeeder extends Seeder
{
    public function __construct(
        private ProductRepositoryInterface $productRepository
    ) {
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $colours = [
            'red', 'green', 'blue'
        ];

        $sizes = [
            'small', 'medium', 'large'
        ];

        $tShirtProduct = $this->productRepository->findByName('T-Shirt');

        for ($i = 0; $i <= 2; $i++) {
            $tShirtSku = Sku::factory()->create([
                'product_id' => $tShirtProduct->id,
                'unit_amount' => 19.99
            ]);

            Attribute::where('product_id', $tShirtProduct->id)
                ->colour()
                ->first()
                ->skus()
                ->attach($tShirtSku->id, ['value' => $colours[$i]]);

            Attribute::where('product_id', $tShirtProduct->id)
                ->size()
                ->first()
                ->skus()
                ->attach($tShirtSku->id, ['value' => $sizes[$i]]);
        }
    }
}
