<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [App\Http\Controllers\AuthController::class, 'login'])->name('login');

Route::middleware('auth')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

    Route::prefix('admin')->group(function () {
        Route::get('/account', [App\Http\Controllers\Admin\AdminAccountController::class, 'index'])->name('admin.account');
        Route::get('/account/{id}', [App\Http\Controllers\Admin\AdminAccountController::class, 'detail'])->name('admin.account.detail');

        Route::get('/product', [App\Http\Controllers\Admin\AdminProductController::class, 'index'])->name('admin.product');
        Route::get('/product/add', [App\Http\Controllers\Admin\AdminProductController::class, 'add'])->name('admin.product.add');
        Route::get('/product/{id}', [App\Http\Controllers\Admin\AdminProductController::class, 'detail'])->name('admin.product.detail');
        Route::get('/product/edit/{id}', [App\Http\Controllers\Admin\AdminProductController::class, 'edit'])->name('admin.product.edit');

        Route::get('/payment/pending', [App\Http\Controllers\Admin\AdminPaymentController::class, 'index'])->name('admin.payment.pending');
        Route::get('/payment/waiting-to-process', [App\Http\Controllers\Admin\AdminPaymentController::class, 'waitingToProcess'])->name('admin.payment.waiting-to-process');
        Route::get('/payment/detail/{id}', [App\Http\Controllers\Admin\AdminPaymentController::class, 'detail'])->name('admin.payment.detail');
    });
});
