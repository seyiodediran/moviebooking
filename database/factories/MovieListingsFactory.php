<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class MovieListingsFactory extends Factory
{   

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     
    public function definition()
    {
        $actors = [];

        for($actor = 3; $actor <=3; $actor++) {       
            array_push($actors, fake()->name());
        }


        return [
            'Title' => fake()->name(),
            'Plot' => fake()->paragraph(2),
            'Genre' => 'Action, Adventure, Fantasy',
            'Year' => fake()->year(),
            'Released' => '24 Nov 2022',
            'Rated' => 'PG-13',
            'Director' => fake()->name(),
            'Actors' => implode(',', $actors),
            'Language' => fake()->languageCode(),
            'Runtime' => '1hr',
        ];

    }
}
