<?php

namespace Database\Factories;

use App\Models\House;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $date = date_format($this->faker->dateTimeBetween('+0 days', '+2 years'), "Y/m/d");
        return [
            'house_id' => House::all()->random(1)->first(),
            'dateFrom' => $date,
            'dateTo' => date_format($this->faker->dateTimeBetween($date, '+3 years'), "Y/m/d"),
            'user_id' => User::all()->random(1)->first()
        ];
    }
}
