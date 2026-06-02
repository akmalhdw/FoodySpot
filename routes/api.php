<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthApiController;
use App\Http\Controllers\Api\RestaurantController;
use App\Http\Controllers\Api\FoodAndBeverageController;
use App\Http\Controllers\Api\DeliveryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// --- Public Routes (No Login Required) ---

// Authentication
Route::post('/login', [AuthApiController::class, 'login']);
Route::post('/register', [AuthApiController::class, 'register']);

// Restaurants
Route::get('/resto', [RestaurantController::class, 'index']);
Route::get('/resto/desc', [RestaurantController::class, 'indexDesc']);

// Food & Beverages
Route::get('/resto/F&B', [FoodAndBeverageController::class, 'index']);


// --- Protected Routes (Login Required) ---
Route::middleware('auth:sanctum')->group(function () {

    // Authentication
    Route::post('/logout', [AuthApiController::class, 'logout']);
    Route::post('/delete-account', [AuthApiController::class, 'deleteAccount']);

    // User profile
    Route::post('/user/update', [AuthApiController::class, 'updateProfile']);
    Route::post('/user/change-password', [AuthApiController::class, 'changePassword']);
    Route::get('/user', function (Request $request) {
        return response()->json(['user' => $request->user()]);
    });

    // Restaurants (CRUD)
    Route::post('/resto', [RestaurantController::class, 'store']);
    Route::put('/resto', [RestaurantController::class, 'update']);
    Route::delete('/resto', [RestaurantController::class, 'destroy']);

    // Food & Beverages (CRUD)
    Route::post('/resto/F&B', [FoodAndBeverageController::class, 'store']);
    Route::put('/resto/F&B', [FoodAndBeverageController::class, 'update']);
    Route::delete('/resto/F&B', [FoodAndBeverageController::class, 'destroy']);

    // Delivery
    Route::post('/resto/delivery', [DeliveryController::class, 'store']);
});
