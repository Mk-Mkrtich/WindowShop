<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BasketController;


Route::post('/login', [AuthController::class, 'login']);

Route::prefix('basket')->controller(BasketController::class)->group(function () {
    Route::post('/', 'add');
    Route::get('/', 'items');
    Route::delete('/', 'clear');
    Route::delete('/{product_id}', 'remove');
});

Route::prefix('products')->controller(ProductController::class)->group(function () {
    Route::get('/', 'items');
});

Route::middleware('auth:api')->prefix('order')->controller(OrderController::class)->group(function () {
    Route::post('/', 'order');
    Route::get('/', 'get');
});
