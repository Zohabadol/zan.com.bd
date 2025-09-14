<?php

use App\Http\Controllers\Auth\AuthController; 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Admin\BannerController;
use App\Http\Controllers\Api\Admin\TestimonialController;
use App\Http\Controllers\Api\Admin\CategoryController;  // Fixed typo here
use App\Http\Controllers\Api\Admin\ServiceController;

// Admin Routes with Middleware
Route::group(['middleware' => 'adminPermission', 'prefix' => 'admin'], function () {
    Route::apiResource('testimonials', TestimonialController::class);
    Route::apiResource('banners', BannerController::class);
    Route::apiResource('categories', CategoryController::class);  // Fixed typo here
    Route::apiResource('services', ServiceController::class);
    Route::get('/category-service/{category_id}', [ServiceController::class, 'getByCategory']);
});

// Authentication Routes (register and login)
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
