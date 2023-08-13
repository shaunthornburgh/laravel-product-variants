<?php

declare(strict_types=1);

namespace App\Repositories;

interface ProductRepositoryInterface
{
    public function all();
    public function find(int $id);
    public function findByName(string $name);
}
