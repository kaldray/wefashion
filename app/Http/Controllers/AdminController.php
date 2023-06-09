<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductsRequest;
use App\Models\Categories;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

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
    $product = Product::create(
      $this->createOrDeleteImage(new Product(), $request)
    );
    $sizes = $request->safe()->only([$this->sizes, "sizes"]);
    /**
     * Check if sizes is empty
     */
    $sizes = $this->checkIfKeysExists($sizes);

    foreach ($sizes as $s) {
      $product->sizes($s)->saveMany([new Size(["sizes" => $s])]);
    }
    return redirect()
      ->route("admin.index")
      ->with("succes", "L'article a été crée avec succès");
  }

  /**
   * Show the form for editing a product.
   */
  public function edit(Product $product): View
  {
    $categories = Categories::all();
    $allSizes = $this->sizes;

    foreach ($product->sizes as $s) {
      $key = array_search($s->sizes, $allSizes);
      unset($allSizes[$key]);
    }

    return view("admin.edit", [
      "product" => $product,
      "categories" => $categories,
      "state" => $this->state,
      "published" => $this->published,
      "sizes" => $allSizes,
    ]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(
    Product $product,
    ProductsRequest $request
  ): RedirectResponse {
    $product->update($this->createOrDeleteImage($product, $request));
    $sizes = $request->safe()->only([$this->sizes, "sizes"]);

    $sizes = $this->checkIfKeysExists($sizes);

    foreach ($this->sizes as $value) {
      if (array_key_exists($value, $sizes)) {
        $product->sizes($value)->updateOrCreate(["sizes" => $value]);
      } else {
        Size::where("product_id", $product->id)->delete();
      }
    }

    return redirect()
      ->route("admin.index", ["product" => $product->id])
      ->with("succes", "L'article a été modifié avec succès");
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Product $product): RedirectResponse
  {
    $this->deleteImageWithProduct($product);
    $product->delete();
    return redirect()
      ->route("admin.index")
      ->with("succes", "L'article a été supprimé avec succès");
  }

  /**
   * Store image if empty
   * Delete and Update if exist
   */
  private function createOrDeleteImage(
    Product $product,
    ProductsRequest $request
  ): array {
    $data = $request->except(["sizes"]);
    /**@var UploadedFile $image */
    $image = $request->validated("image");
    if ($product->image) {
      Storage::disk("public")->delete($product->image);
    }
    $categoryPath = Categories::find($data["categories_id"])->name;
    $data["image"] = $image->store("products/" . $categoryPath, "public");
    return $data;
  }

  /**
   * Delete image before the product
   */
  private function deleteImageWithProduct(Product $product)
  {
    if ($product->image) {
      Storage::disk("public")->delete($product->image);
    }
  }

  private function checkIfKeysExists($sizes): array
  {
    if (array_key_exists("sizes", $sizes)) {
      $sizes = $sizes["sizes"];
    }
    return $sizes;
  }
}
