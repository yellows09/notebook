<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Notebook>
 */
class NotebookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'surname' => $this->faker->word,
            'patronymic' => $this->faker->word,
            'company' => ucfirst($this->faker->word),
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->email,
            'date_of_birth' => $this->faker->dateTimeBetween('1900-01-01','2020-01-01')
        ];
    }
}
