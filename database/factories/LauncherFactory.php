<?php

namespace Database\Factories;

use App\Models\City;
use Illuminate\Database\Eloquent\Factories\Factory;

class LauncherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'status' => true,
            'user_email' => $this->faker->email(),
            'user_birth_day' => '1368/02/04',
            'about' => $this->faker->text(),
            'launcher_type' => 'hoghoghi',
            'company_name' => $this->faker->name(),
            'company_type' => 'khososi',
            'postal_code' => $this->faker->postcode(),
            'code' => $this->faker->postcode(),
            'launcher_address' => $this->faker->address(),
            'launcher_city_id' => City::first()->id,
            'launcher_email' => $this->faker->email(),
            'launcher_site' => $this->faker->url(),
            'launcher_phone' => $this->faker->phoneNumber(),
            'launcher_x' => $this->faker->latitude(),
            'launcher_y' => $this->faker->longitude()
        ];
    }
}
