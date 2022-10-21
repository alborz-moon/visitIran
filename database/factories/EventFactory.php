<?php

namespace Database\Factories;

use App\Http\Controllers\Controller;
use App\Models\EventTag;
use App\Models\Facility;
use App\Models\Launcher;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $rand = random_int(10, 100);
        $rand2 = random_int(-2, 5);
        $rand3 = random_int(-2, 5);
        $facilities = null;
        $tags = null;

        if($rand2 > 0) {
            $facilities = "";
            for($i = 0; $i < $rand2; $i++) {
                if($i == 0)
                    $facilities .= Facility::inRandomOrder()->first()->label;
                else
                    $facilities .= '_' . Facility::inRandomOrder()->first()->label;
            }
        }
        
        if($rand3 > 0) {
            $tags = "";
            for($i = 0; $i < $rand3; $i++) {
                if($i == 0)
                    $tags .= EventTag::inRandomOrder()->first()->label;
                else
                    $tags .= '_' . EventTag::inRandomOrder()->first()->label;
            }
        }

        $lanuncher = Launcher::inRandomOrder()->first();
        $off_rand = random_int(10, 100) % 2 == 0;

        return [
            'title' => $this->faker->name(),
            'start_registry' => (int)Controller::getToday()['date'],
            'end_registry' => $rand % 2 == 0 ? '14020101' : (int)Controller::getToday()['date'],
            'price' => random_int(20, 30) * 10000,
            'facilities' => $facilities,
            'tags' => $tags,
            'ticket_description' => random_int(10, 1000) < 500 ? $this->faker->text() : null,
            'level_description' => random_int(10, 1000) < 500 ? $this->faker->text() : null,
            'age_description' => random_int(10, 1000) < 500 ? $this->faker->text() : null,
            'description' => $this->faker->text(),
            'status' => random_int(1, 100) > 30,
            'capacity' => random_int(1, 30),
            'address' => $lanuncher->launcher_address,
            'email' => $lanuncher->launcher_email,
            'site' => $lanuncher->launcher_site,
            'phone' => $lanuncher->launcher_phone,
            'x' => $lanuncher->launcher_x,
            'y' => $lanuncher->launcher_y,
            'city_id' => $lanuncher->launcher_city_id,
            'launcher_id' => $lanuncher->id,
            'is_in_top_list' => random_int(1, 30) < 15,
            'visibility' => random_int(1, 30) > 5,
            'priority' => random_int(1, 30),
            'off' => $off_rand ? random_int(10, 20) : null,
            'off_type' => 'percent',
            'off_expiration' => $off_rand ? '14020101' : null
        ];
    }
}
