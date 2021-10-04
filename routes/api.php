<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ApiAuthenticationController;


Route::post('register', [ApiAuthenticationController::class, 'register']);
Route::post('login', [ApiAuthenticationController::class, 'login']);



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
