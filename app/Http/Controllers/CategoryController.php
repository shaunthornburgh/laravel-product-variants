<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryCollection;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Repositories\CategoryRepositoryInterface;

class CategoryController extends Controller
{
    /**
     * @param CategoryRepositoryInterface $categoryRepository
     */
    public function __construct(
        public CategoryRepositoryInterface $categoryRepository
    ) {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): CategoryCollection
    {
        return new CategoryCollection($this->categoryRepository->all());
    }

    /**
     * Display the specified resource.
     *
     * @param Category $category
     */
    public function show(Category $category): CategoryResource
    {
        return new CategoryResource($this->categoryRepository->find($category->id));
    }
}
