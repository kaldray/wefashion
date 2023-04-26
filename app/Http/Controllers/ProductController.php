<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ProductController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(): View
  {
    /**
     * Sent the Product per group
     */
    $products = Product::simplePaginate(6);
    /**
     * Get selection lenght
     */
    $number = Product::count();
    return view("pages.home", ["products" => $products, "number" => $number]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    $categoryId = Categories::where("name", $id)->first(["id"]);

    $products = Product::query()
      ->where("categories_id", "=", $categoryId->id)
      ->simplePaginate(6);

    /**
     * Get selection lenght
     */
    $number = Product::query()
      ->where("categories_id", "=", $categoryId->id)
      ->count();

    return view("pages.categories", [
      "products" => $products,
      "number" => $number,
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    //
  }
}
