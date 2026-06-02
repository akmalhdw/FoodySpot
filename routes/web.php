<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RestaurantWebController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UserProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// --- Static Pages ---
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');

// --- Restaurant Browsing (Public) ---
Route::get('/restaurants', [RestaurantWebController::class, 'index'])->name('restaurants.index');
Route::get('/restaurants/{id}', [RestaurantWebController::class, 'show'])->name('restaurants.show');

// --- Protected Routes (Logged-in Users) ---
Route::middleware('auth')->group(function () {

    // User profile
    Route::get('/profile', [UserProfileController::class, 'show'])->name('profile.show');
    Route::get('/settings', [UserProfileController::class, 'settings'])->name('profile.settings');

    Route::post('/settings/preferences', [UserProfileController::class, 'updatePreferences'])->name('profile.preferences.update');
    Route::post('/settings/profile', [UserProfileController::class, 'updateProfile'])->name('profile.update');
    Route::post('/settings/password', [UserProfileController::class, 'changePassword'])->name('profile.password.update');
    Route::post('/settings/delete-account', [UserProfileController::class, 'deleteAccount'])->name('profile.delete-account');

    // Logout
    Route::post('/log-out', [LoginController::class, 'destroy'])->name('logout');
});

// --- Authentication Routes (Guest only) ---
Route::middleware('guest')->group(function () {
    Route::get('/log-in', [LoginController::class, 'create'])->name('login');
    Route::post('/log-in', [LoginController::class, 'store'])->name('login.store');

    Route::get('/register', [RegisterController::class, 'create'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
});
