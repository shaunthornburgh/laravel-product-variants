<?php

namespace App\Repositories;

use App\Models\Category;

use Illuminate\Database\Eloquent\Collection;

class CategoryRepository implements CategoryRepositoryInterface
{
    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return Category::with([
                'products' => function ($query) {
                    $query->has('skus');
                }
            ])
            ->has('skus')
            ->get();
    }

    /**
     * @param int $id
     * @return Category
     */
    public function find(int $id): Category
    {
        return Category::find($id);
    }

    /**
     * @param string $name
     * @return Category
     */
    public function findByName(string $name): Category
    {
        return Category::where('name', $name)->first();
    }
}
