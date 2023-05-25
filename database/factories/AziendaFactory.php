<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Azienda>
 */
class AziendaFactory extends Factory
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
            'nome' => $this->faker->company,
            'via' => $this->faker->streetName,
            'citta' => $this->faker->city,
            'numero_civico' => $this->faker->buildingNumber,
            'cap' => str_pad($this->faker->numberBetween(100, 99100), 5, '0', STR_PAD_BOTH),
            'logo' => $this->faker->image('public/images/aziende/', 640, 480, 'companies', false),
            'ragione_sociale' => $this->faker->companySuffix,
            'descrizione' => $this->faker->text,
            'tipologia' => $this->faker->randomElement(['tecnologia', 'moda', 'alimentari']),
        ];
    }
}
