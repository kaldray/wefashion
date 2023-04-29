<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogOutController;
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

Route::resource("/solde", SoldeController::class)->only(["index"]);
Route::resource("/login", LoginController::class)
  ->middleware("guest")
  ->only(["index", "store"]);
Route::resource("/admin", AdminController::class)
  ->middleware("auth")
  ->parameters(["admin" => "product"])
  ->except(["show"]);
Route::resource("/categories", CategoriesController::class)
  ->middleware("auth")
  ->except(["show"]);
Route::get("/logout", [LogOutController::class, "index"])->name("auth.logout");
Route::controller(ProductController::class)->group(function () {
  Route::get("/", "index")->name("home");
  Route::get("/{id}", "show")->name("home.category");
});
Route::get("/products/{id}", [UniqueProductController::class, "show"])->name(
  "home.product"
);
