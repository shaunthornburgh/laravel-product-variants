<?php

declare(strict_types=1);

namespace App\Repositories;

interface SkuRepositoryInterface
{
    public function all();
    public function find(int $id);
}
