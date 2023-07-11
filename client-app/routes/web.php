<?php

use App\Http\Controllers\MemberController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home.index');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::post('/login', [MemberController::class, 'login']);
Route::post("/logout", [MemberController::class, 'logout']);

Route::get('/register', function () {
    return view('auth.register');
});


Route::middleware(['memberAuth'])->group(function () {
    Route::get("/member_home", [MemberController::class, "dashboard"]);
});
