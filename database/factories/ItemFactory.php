<?php

namespace Database\Factories;

use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Item::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'price' => $this->faker->numberBetween(0,10),
            'summary' => $this->faker->sentence(30),
            'category_id' => $this->faker->numberBetween(1,5),
            'image' => 'piano.png',
            'supply' => true,
            'properties' => $this->faker->sentence(20),
        ];
    }
}
