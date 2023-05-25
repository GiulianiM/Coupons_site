<?php

namespace Database\Factories\Resources;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Resources\Faq>
 */
class FaqFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'idUtente' => 1,
            'titolo' => $this->faker->sentence,
            'descrizione' => $this->faker->text,
        ];
    }
}
