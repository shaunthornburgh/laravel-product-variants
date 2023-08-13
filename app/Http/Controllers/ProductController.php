<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Repositories\ProductRepositoryInterface;

class ProductController extends Controller
{
    /**
     * @param ProductRepositoryInterface $productRepository
     */
    public function __construct(
        public ProductRepositoryInterface $productRepository
    ) {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): ProductCollection
    {
        return new ProductCollection($this->productRepository->all());
    }

    /**
     * Display the specified resource.
     *
     * @param Product $product
     */
    public function show(Product $product): ProductResource
    {
        return new ProductResource($this->productRepository->find($product->id));
    }
}
