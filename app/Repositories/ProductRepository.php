<?php

namespace App\Repositories;

use App\Models\Product;

use Illuminate\Database\Eloquent\Collection;

class ProductRepository implements ProductRepositoryInterface
{
    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return Product::has('skus')->get();
    }

    /**
     * @param int $id
     * @return Product
     */
    public function find(int $id): Product
    {
        return Product::find($id);
    }

    /**
     * @param string $name
     * @return Product
     */
    public function findByName(string $name): Product
    {
        return Product::where('name', $name)->first();
    }
}
