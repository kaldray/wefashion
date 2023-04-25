<?php

namespace Database\Factories;

use App\Models\SizeModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class SizeFactory extends Factory
{


    protected $model = SizeModel::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "sizes" => fake()->randomElement(['"XS,S,M,L,XL"'])
        ];
    }
}
