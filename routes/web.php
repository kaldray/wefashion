<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SoldeController;
use App\Http\Controllers\UniqueProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::resource("/solde", SoldeController::class);
Route::resource("/login", LoginController::class);
Route::resource("/admin", AdminController::class)->middleware("auth");
Route::get("/", [ProductController::class, "index"])->name("home");
Route::get("/{id}", [ProductController::class, "show"])->name("home.category");
Route::get("/products/{id}", [UniqueProductController::class, "show"])->name(
  "home.product"
);
