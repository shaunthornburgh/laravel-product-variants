<?php

namespace App\Http\Controllers;

use App\Http\Resources\SkuCollection;
use App\Http\Resources\SkuResource;
use App\Models\Sku;
use App\Repositories\SkuRepositoryInterface;

class SkuController extends Controller
{
    /**
     * @param SkuRepositoryInterface $skuRepository
     */
    public function __construct(
        public SkuRepositoryInterface $skuRepository
    ) {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): SkuCollection
    {
        return new SkuCollection($this->skuRepository->all());
    }

    /**
     * Display the specified resource.
     *
     * @param Sku $sku
     */
    public function show(Sku $sku): SkuResource
    {
        return new SkuResource($this->skuRepository->find($sku->id));
    }
}
