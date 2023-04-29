<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class SoldeController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(): View
  {
    $products = Product::where("state", "solde")
      ->orderBy("created_at", "desc")
      ->simplePaginate(6);
    /**
     * Get selection lenght
     */
    $number = Product::where("state", "solde")->count();
    return view("pages.solde", ["products" => $products, "number" => $number]);
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
    //
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
