<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix('v1')->group(function () {
    Route::post('/login', [App\Http\Controllers\Api\AuthApiController::class, 'login']);
    Route::post('/register', [App\Http\Controllers\Api\AuthApiController::class, 'register']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/logout', [App\Http\Controllers\Api\AuthApiController::class, 'logout']);
        Route::get('/auth', [App\Http\Controllers\Api\AuthApiController::class, 'auth']);
        Route::post('/password/update', [App\Http\Controllers\Api\AuthApiController::class, 'changePassword']);

        Route::get('/category', [App\Http\Controllers\Api\ProductApiController::class, 'getCategory']);
        Route::get('/product', [App\Http\Controllers\Api\ProductApiController::class, 'getProduct']);
        Route::post('/detail-product', [App\Http\Controllers\Api\ProductApiController::class, 'getProductDetail']);

        Route::post('/product/detail', [App\Http\Controllers\Api\ProductApiController::class, 'getProductDetail']);
        Route::post('/product/category', [App\Http\Controllers\Api\ProductApiController::class, 'getProductByCategory']);
        Route::post('/cart/add', [App\Http\Controllers\Api\ProductApiController::class, 'addToCart']);
        Route::get('/cart', [App\Http\Controllers\Api\ProductApiController::class, 'getCart']);
        Route::post('/cart/delete', [App\Http\Controllers\Api\ProductApiController::class, 'deleteCart']);

        Route::get('/get-address', [App\Http\Controllers\Api\UserDataApiController::class, 'getAddress']);
        Route::post('/set-address', [App\Http\Controllers\Api\UserDataApiController::class, 'setAddress']);
        Route::post('/edit-password', [App\Http\Controllers\Api\UserDataApiController::class, 'editPassword']);

        Route::get('/make-order', [App\Http\Controllers\Api\UserOrderController::class, 'makeOrder']);
        Route::get('/get-order', [App\Http\Controllers\Api\UserOrderController::class, 'getOrders']);
    });
});
