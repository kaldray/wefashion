<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Size;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class SizeFactory extends Factory
{


    protected $model = Size::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "sizes" => fake()->randomElement(["XS", "S", "M", "L", "XL"]),
            "quantity" => fake()->randomDigit(),
            "product_id" => Product::all()->random()->id,
        ];
    }
}
