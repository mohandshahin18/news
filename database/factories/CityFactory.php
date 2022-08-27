<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'city_name' => $this->faker->city(),
            'street' => $this->faker->streetAddress(),
            'country_id' => $this->faker->randomNumber(1 , 10),


        ];
    }
}
