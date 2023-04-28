<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductsRequest;
use App\Models\Categories;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class AdminController extends Controller
{
  protected $state = ["solde", "standard"];
  protected $published = ["non publié", "publié"];
  protected $sizes = ["XS", "S", "M", "L", "XL"];
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
  public function create(): View
  {
    $categories = Categories::all();
    return view("admin.create", [
      "state" => $this->state,
      "published" => $this->published,
      "categories" => $categories,
      "sizes" => $this->sizes,
    ]);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(ProductsRequest $request)
  {
    $post = Product::create($request->except(["sizes"]));
    $sizes = $request->safe()->only([$this->sizes, "sizes"])["sizes"];
    foreach ($sizes as $s) {
      $post->sizes($s)->saveMany([new Size(["sizes" => $s])]);
    }
    return redirect()
      ->route("admin.index")
      ->with("succes", "L'article a éte crée avec succès");
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
  public function destroy(Product $product): RedirectResponse
  {
    $product->delete();
    return redirect()
      ->route("admin.index")
      ->with("succes", "L'article a éte supprimé avec succès");
  }
}
