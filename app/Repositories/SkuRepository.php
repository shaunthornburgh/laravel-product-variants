<?php

namespace App\Repositories;

use App\Models\Sku;
use Illuminate\Database\Eloquent\Collection;

class SkuRepository implements SkuRepositoryInterface
{
    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return Sku::all();
    }

    /**
     * @param int $id
     * @return Sku
     */
    public function find(int $id): Sku
    {
        return Sku::find($id);
    }
}
