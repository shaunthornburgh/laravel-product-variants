<?php

declare(strict_types=1);

namespace App\Repositories;

interface CategoryRepositoryInterface
{
    public function all();
    public function find(int $id);
    public function findByName(string $name);
}
