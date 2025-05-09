<?php

use App\Http\Controllers\Api\CertificateVerifyController;
use App\Http\Controllers\ContactMessageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/contactus', [ContactMessageController::class, 'store']);

Route::apiResource('api-posts', PostController::class);
Route::apiResource('users', UserController::class);
Route::post('verify-certificate',[CertificateVerifyController::class,'certificateVerify']);



