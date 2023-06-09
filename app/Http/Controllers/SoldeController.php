<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SoldeController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(): View|RedirectResponse
  {
    $products = Product::where("state", "solde")
      ->where("published", "publié")
      ->orderBy("created_at", "desc")
      ->simplePaginate(6);

    if (count($products) === 0) {
      return redirect()
        ->route("home")
        ->with(
          "indisponible",
          "Aucun produit n'est disponible pour la page demandée"
        );
    }
    /**
     * Get selection lenght
     */
    $number = Product::where("state", "solde")
      ->where("published", "publié")
      ->count();
    return view("pages.solde", ["products" => $products, "number" => $number]);
  }
}
