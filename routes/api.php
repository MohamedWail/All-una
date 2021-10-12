<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ApiAuthenticationController;
use App\Http\Controllers\API\ApiCategoryController;
use App\Http\Controllers\API\ApiProductController;



Route::middleware(['Localization'])->group(function () {
  //Category API's
  Route::get('categories', [ApiCategoryController::class, 'index']);
  //Product API'S
  Route::get('products', [ApiProductController::class, 'products']);
});

//Authentication API's
Route::post('register-buyer', [ApiAuthenticationController::class, 'registerBuyer']);
Route::post('register-seller', [ApiAuthenticationController::class, 'registerSeller']);
Route::post('login', [ApiAuthenticationController::class, 'login']);





