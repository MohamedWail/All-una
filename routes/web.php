<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\SellerDashboard\SellerDashboardController;
use App\Http\Controllers\SellerDashboard\SellerProductController;




Route::middleware(['auth'])->group(function () {
    //DashboardController
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
    //SellerDashboardController
    Route::get('/SellerDashboard', [SellerDashboardController::class, 'index'])->name('SellerDashboard');
    //SellerProductController
    Route::get('/SellerDashboard/create', [SellerProductController::class, 'create'])->name('SellerDashboard.create');
    Route::post('/SellerDashboard/create', [SellerProductController::class, 'store'])->name('SellerDashboard.store');
    Route::get('/SellerDashboard/edit_request/{id}', [SellerProductController::class, 'edit'])->name('SellerDashboard.edit');
    Route::patch('/SellerDashboard/delete_request/{id}', [SellerProductController::class, 'delete'])->name('SellerDashboard.delete');
    Route::patch('/SellerDashboard/submit_request/{id}', [SellerProductController::class, 'submitRequest'])->name('SellerDashboard.submit');
    //UserController
    Route::get('/approved/{id}', [UserController::class, 'approved'])->name('approved');
    Route::get('/rejected/{id}', [UserController::class, 'rejected'])->name('rejected');
    Route::delete('/delete/{id}', [UserController::class, 'delete'])->name('user.delete');
    //CategoryController
    Route::get('/category', [CategoryController::class, 'index'])->name('CategoryHome');
    Route::get('/category/create', [CategoryController::class, 'create'])->name('CategoryCreate');
    Route::post('/category/create', [CategoryController::class, 'store'])->name('CategoryStore');
    Route::get('/category/{id}', [CategoryController::class, 'edit'])->name('CategoryEdit');
    Route::patch('/category/{id}', [CategoryController::class, 'update'])->name('CategoryUpdate');
    Route::delete('/category/{id}/delete', [CategoryController::class, 'delete'])->name('CategoryDelete');
    //ProductController
    Route::get('/product', [ProductController::class, 'index'])->name('ProductHome');
    Route::get('/product/approve/{id}', [ProductController::class, 'approved'])->name('ProductApprove');
    Route::get('/product/reject/{id}', [ProductController::class, 'rejected'])->name('ProductReject');
    Route::get('/product/on_hold', [ProductController::class, 'onhold'])->name('OnHoldProducts');
    Route::get('/product/{id}', [ProductController::class, 'edit'])->name('ProductEdit');
    Route::patch('/product/{id}', [ProductController::class, 'update'])->name('ProductUpdate');
    Route::delete('/product/{id}', [ProductController::class, 'delete'])->name('ProductDelete');
});


require __DIR__.'/auth.php';