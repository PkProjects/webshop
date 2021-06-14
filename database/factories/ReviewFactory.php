<?php

namespace Database\Factories;

use App\Models\Review;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Review::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(0,5),
            'review' => $this->faker->sentence(20),
            'rating' => 5,
            'pros' => $this->faker->sentence(20),
            'cons' => $this->faker->sentence(20),
        ];
    }
}
