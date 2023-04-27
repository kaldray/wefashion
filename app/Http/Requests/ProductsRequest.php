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
      "name" => ["string", "min:5", "max:100"],
      "description" => ["string"],
      "price" => ["decimal:0,2"],
      "image" => ["string"],
      "published" => ["exists:products,published"],
      "state" => ["exists:products,state"],
      "reference" => ["alpha_num", "max:16", Rule::unique("products")],
      "categories_id" => [Rule::exists("categories", "id")],
    ];
  }
}
