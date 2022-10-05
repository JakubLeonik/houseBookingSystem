<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\House>
 */
class HouseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(),
            'pricePerNight' => $this->faker->randomNumber()*10,
            'numberOfRooms' => $this->faker->randomNumber()+1,
            'user_id' => User::all()->random(1)->first(),
        ];
    }
}
