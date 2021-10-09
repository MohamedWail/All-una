<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ApiAuthenticationController;
use App\Http\Controllers\API\ApiCategoryController;


//Authentication API's
Route::post('register-buyer', [ApiAuthenticationController::class, 'registerBuyer']);
Route::post('register-seller', [ApiAuthenticationController::class, 'registerSeller']);
Route::post('login', [ApiAuthenticationController::class, 'login']);

//Category API's
Route::get('categories', [ApiCategoryController::class, 'index']);




