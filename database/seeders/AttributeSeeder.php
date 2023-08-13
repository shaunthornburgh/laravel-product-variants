<?php

namespace Database\Seeders;

use App\Models\Attribute;
use App\Repositories\ProductRepositoryInterface;
use Illuminate\Database\Seeder;

class AttributeSeeder extends Seeder
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
        $tShirtProduct = $this->productRepository->findByName('T-Shirt');

        Attribute::insert([
            [
                'product_id' => $tShirtProduct->id,
                'name' => Attribute::COLOUR
            ],
            [
               'product_id' => $tShirtProduct->id,
               'name' => Attribute::SIZE
            ],
        ]);

    }
}
