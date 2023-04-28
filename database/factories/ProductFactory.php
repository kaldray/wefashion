<?php

namespace Database\Factories;

use App\Models\Categories;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
{
  protected $model = Product::class;

  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    return [
      "name" => fake()->name(),
      "description" => fake()->sentence(10),
      "price" => fake()->randomFloat(2, 0, 100),
      "image" => fake()->imageUrl(200, 200),
      "published" => fake()->randomElement(["publié", "non publié"]),
      "state" => fake()->randomElement(["solde", "standard"]),
      "reference" => fake()
        ->unique()
        ->regexify("[A-Za-z0-9]{16}"),
      "categories_id" => Categories::all()->random()->id,
    ];
  }
}
