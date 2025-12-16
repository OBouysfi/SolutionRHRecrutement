<?php

namespace Database\Factories;

use App\Models\Formation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Formation>
 */
class FormationFactory extends Factory
{
    /**
     * The name of the corresponding model.
     *
     * @var string
     */
    protected $model = Formation::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'profile_id' => $this->faker->numberBetween(1, 50),
            'diploma_id' => $this->faker->numberBetween(1, 20),
            'level_id' => $this->faker->numberBetween(1, 10),
            'name' => $this->faker->word,
            'description' => $this->faker->paragraph,
            'started_at' => $this->faker->dateTimeBetween('-5 years', '-1 year'),
            'finished_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
