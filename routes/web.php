<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\dashboard\UserController;



Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
    Route::get('/approved/{id}', [UserController::class, 'approved'])->name('approved');
    Route::get('/rejected/{id}', [UserController::class, 'rejected'])->name('rejected');
    Route::delete('/delete/{id}', [UserController::class, 'delete'])->name('user.delete');
});


require __DIR__.'/auth.php';
