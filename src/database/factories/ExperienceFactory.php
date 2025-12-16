<?php

namespace Database\Factories;

use App\Models\Experience;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Experience>
 */
class ExperienceFactory extends Factory
{
    /**
     * The name of the corresponding model.
     *
     * @var string
     */
    protected $model = Experience::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'profile_id' => $this->faker->numberBetween(1, 50),
            'profession_id' => $this->faker->numberBetween(1, 20),
            'description' => $this->faker->paragraph,
            'started_at' => $this->faker->dateTimeBetween('-10 years', '-5 years'),
            'finished_at' => $this->faker->dateTimeBetween('-5 years', 'now'),
        ];
    }
}
