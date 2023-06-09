<?php

namespace Database\Factories\Resources;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Resources\Promozione>
 */
class PromozioneFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $inizio = $this->faker->dateTimeBetween('-2 week', '+2 week');
        $fine = $this->faker->dateTimeBetween($inizio, '+4 week');

        return [
            'idAzienda' => 1,
            'titolo' => $this->faker->sentence,
            'descrizione' => $this->faker->text,
            'immagine' => $this->faker->image('public/images/promozioni/', 640, 480, 'promos', false),
            'modalita' => $this->faker->randomElement(['Online', 'Negozio']),
            'luogo' => $this->faker->randomElement([$this->faker->url, $this->faker->address]),
            'inizio' => $inizio,
            'fine' => $fine,
            'sconto' => $this->faker->randomElement(['prezzo_fisso', 'quantita', 'percentuale']),
            'valore_sconto' => function (array $attributes) {
                $sconto = $attributes['sconto'];

                if ($sconto === 'prezzo_fisso') {
                    return $this->faker->numberBetween(5, 20);
                } elseif ($sconto === 'quantita') {
                    return $this->faker->numberBetween(1, 5);
                } else {
                    return $this->faker->numberBetween(10, 50);
                }
            },
        ];
    }
}
