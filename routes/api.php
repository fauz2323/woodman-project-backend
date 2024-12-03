<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix('v1')->group(function () {
    Route::post('/login',[App\Http\Controllers\Api\AuthApiController::class,'login']);
    Route::post('/register',[App\Http\Controllers\Api\AuthApiController::class,'register']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/logout',[App\Http\Controllers\Api\AuthApiController::class,'logout']);
        Route::get('/auth',[App\Http\Controllers\Api\AuthApiController::class,'auth']);

        Route::get('/category',[App\Http\Controllers\Api\ProductApiController::class,'getCategory']);
        Route::get('/product',[App\Http\Controllers\Api\ProductApiController::class,'getProduct']);
        Route::post('/product/detail',[App\Http\Controllers\Api\ProductApiController::class,'getProductDetail']);
        Route::post('/product/category',[App\Http\Controllers\Api\ProductApiController::class,'getProductByCategory']);
    });
});
