<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Education>
 */
class EducationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'school'=> $this->faker->name,
            'credentials' => $this->faker-> sentence,
            'startDate' => $this-> faker->dateTimeThisDecade, 
            'endDate' => $this-> faker->dateTimeThisDecade, 
            'description'=> $this ->faker->sentence,
        ];
    }
}
