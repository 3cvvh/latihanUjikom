<?php

use App\Http\Controllers\AUth\AuthController;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('welcome');
// });

// Route::middleware("guest")->group(function(){
//     Route::get("/",[AuthController::class, "login"])->name("login");
//     Route::post("/",[AuthController::class, "store"])->name("login.store");
// });

// Route::middleware("auth")->group(function(){
//     Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
//     Route::get("/dashboard", function(){
//         $title = "dashboard|page";
//         return view("dashboard.index", compact("title"));
//     })->name("dashboard.index");
// });
