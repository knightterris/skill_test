<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ProjectController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name("loginPage");

Route::get("/register",function() {
    return view("register");
})->name("registerPage");


Route::post("/register",[AuthController::class,'register'])->name("register");
Route::post("/login",[AuthController::class,'login'])->name("login");
Route::resource("tests",TestController::class);
Route::resource("projects",ProjectController::class);
