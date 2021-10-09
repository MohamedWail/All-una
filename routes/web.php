<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\SellerDashboard\SellerDashboardController;




Route::middleware(['auth'])->group(function () {
    //DashboardController
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
    //SellerDashboardController
    Route::get('/SellerDashboard', [SellerDashboardController::class, 'index'])->name('SellerDashboard');
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

});


require __DIR__.'/auth.php';
