<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SkuController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['guest']], function () {
    Route::apiResource('category', CategoryController::class)->only(['index', 'show']);
    Route::apiResource('product', ProductController::class)->only(['index', 'show']);
    Route::apiResource('sku', SkuController::class)->only(['index', 'show']);
});
