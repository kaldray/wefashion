<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;

class UniqueProductController extends Controller
{
  public function show(string $id)
  {
    $product = Product::find($id);

    $sizes = Size::where("product_id", $id)->get();

    return view("pages.product", [
      "product" => $product,
      "sizes" => $sizes,
    ]);
  }
}
