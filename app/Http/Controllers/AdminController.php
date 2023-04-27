<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductsRequest;
use App\Models\Categories;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AdminController extends Controller
{
  protected $state = ["solde", "standard"];
  protected $published = ["non publié", "publié"];
  /**
   * Display a listing of the resource.
   */
  public function index(): View
  {
    $products = Product::simplePaginate(15);
    return view("admin.products", ["products" => $products]);
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
   * Show the form for editing a product.
   */
  public function edit(Product $product): View
  {
    $categories = Categories::all();
    return view("admin.edit", [
      "product" => $product,
      "categories" => $categories,
      "state" => $this->state,
      "published" => $this->published,
    ]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Product $product, ProductsRequest $request)
  {
    $product->update($request->validated());
    return redirect()
      ->route("admin.edit", ["product" => $product->id])
      ->with("succes", "L'article a éte modifié avec succès");
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    //
  }
}
