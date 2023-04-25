<?php

namespace Database\Factories;

use App\Models\ProductModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
{

    protected $model = ProductModel::class;

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
            "price" => fake()->randomFloat(2),
            "image" => fake()->imageUrl(200, 200),
            "published" => fake()->randomElement(['publié', "non publié"]),
            "state" => fake()->randomElement(['solde', "standard"]),
            "reference" => fake()->word(),
        ];
    }
}
