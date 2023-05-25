<?php

namespace Database\Factories\Resources;

use App\Models\Azienda;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Resources\Coupon>
 */
class CouponFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @param int|null $idPromozione
     * @return array<string, mixed>
     */
    public function definition(int $idPromozione = null)
    {
        return [
            'idUtente' => 3,
            'idPromozione' => $idPromozione,
            'codice' => $this->faker->regexify('[A-Z0-9]{6}'),
        ];
    }
}
