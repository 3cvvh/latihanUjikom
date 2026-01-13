<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware("guest")->group(function(){
    Route::get("/",[AuthController::class, "login"])->name("login");
    Route::post("/",[AuthController::class, "store"])->name("login.store");
});
