<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(0,5),
            'item_array' => $this->faker->sentence(20),
            'total_cost' => 5,
            'delivery_adress' => $this->faker->address(),
            'processed' => true,
        ];
    }
}
