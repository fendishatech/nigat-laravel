<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



// Auth Routes.
Route::middleware(['alreadyLoggedIn'])->group(function () {
    Route::get('/', function () {
        return view('auth.login');
    });
});
Route::post("/login", [AuthController::class, 'login']);
Route::post("/logout", [AuthController::class, 'logout']);

// Home Routes
Route::middleware(['loginAuth'])->group(function () {
    // Protected routes here
    Route::get("/home", [HomeController::class, "index"]);
    // user resources
    Route::resource('users', UserController::class);
    Route::resource('clients', ClientController::class);
    Route::resource('members', MemberController::class);
});
