<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ProductsRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   */
  public function authorize(): bool
  {
    return Auth::check();
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
   */
  public function rules(): array
  {
    return [
      "name" => ["string", "min:5", "max:100", "required"],
      "description" => ["string", "required"],
      "price" => ["decimal:0,2", "required"],
      "image" => ["image", "required"],
      "published" => ["exists:products,published", "required"],
      "state" => ["exists:products,state", "required"],
      "reference" => [
        "alpha_num",
        "max:16",
        Rule::unique("products", "reference")->ignore($this->product),
        "required",
      ],
      "categories_id" => [Rule::exists("categories", "id"), "required"],
      "sizes" => ["required", "array", "min:1"],
      "sizes.XS" => [
        Rule::unique("sizes", "product_id")->where(function ($query) {
          $query->where("product_id", $this->request->get("product_id"));
        }),
      ],
      "sizes.S" => [
        Rule::unique("sizes", "product_id")->where(function ($query) {
          $query->where("product_id", $this->request->get("product_id"));
        }),
      ],
      "sizes.M" => [
        Rule::unique("sizes", "product_id")->where(function ($query) {
          $query->where("product_id", $this->request->get("product_id"));
        }),
      ],
      "sizes.L" => [
        Rule::unique("sizes", "product_id")->where(function ($query) {
          $query->where("product_id", $this->request->get("product_id"));
        }),
      ],
      "sizes.XL" => [
        Rule::unique("sizes", "product_id")->where(function ($query) {
          $query->where("product_id", $this->request->get("product_id"));
        }),
      ],
    ];
  }
}
