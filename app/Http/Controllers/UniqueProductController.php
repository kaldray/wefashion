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

    $sizes = Size::all()->where("product_id", $id);
    return view("pages.product", [
      "product" => $product,
      "sizes" => $sizes[0],
    ]);
  }
}
