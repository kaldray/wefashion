<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
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
    $products = Product::where("published", "publié")
      ->orderBy("created_at", "desc")
      ->simplePaginate(6);

    /**
     * Get selection lenght
     */
    $number = Product::where("published", "publié")->count();
    return view("pages.home", ["products" => $products, "number" => $number]);
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id): View|RedirectResponse
  {
    $categoryId = Categories::where("name", $id)->first(["id"]);
    if ($categoryId === null) {
      return redirect()
        ->route("home")
        ->with(
          "indisponible",
          "Aucun produit n'est disponible pour la page demandée"
        );
    }
    $products = Product::where("categories_id", "=", $categoryId->id)
      ->where("published", "publié")
      ->orderBy("created_at", "desc")
      ->simplePaginate(6);

    /**
     * Get selection lenght
     */
    $number = Product::query()
      ->where("categories_id", "=", $categoryId->id)
      ->where("published", "publié")
      ->count();

    return view("pages.categories", [
      "products" => $products,
      "number" => $number,
    ]);
  }
}
