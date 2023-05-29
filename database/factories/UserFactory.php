<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->firstName,
            'cognome' => $this->faker->lastName,
            'genere' => $this->faker->randomElement(['M', 'F']),
            'eta' => $this->faker->numberBetween(18, 60),
            'email' => $this->faker->unique()->safeEmail,
            'telefono' => $this->faker->unique()->regexify('3[0-9]{9}'),
            'username' => $this->faker->userName,
            'password' => Hash::make('JmoxlJ1q'), // password ssh grp_17 hashata
        ];
    }

    public function admin()
    {
        return $this->state([
            'username' => 'adminadmin',
            'password' => '$2y$10$tU8V4QtbLelMkgMyx0Y1Cu7vIqCO6/fU2UfacUghI4PHJ7dkWsS16',
            'livello' => 'admin',
            'nome' => null,
            'cognome' => null,
            'genere' => null,
            'eta' => null,
            'email' => null,
            'telefono' => null,
        ]);
    }

    public function staff()
    {
        return $this->state([
            'nome' => $this->faker->firstName,
            'cognome' => $this->faker->lastName,
            'username' => 'staffstaff',
            'password' => Hash::make('JmoxlJ1q'),
            'livello' => 'staff',
            'genere' => null,
            'eta' => null,
            'email' => null,
            'telefono' => null,
        ]);
    }

    public function user()
    {
        return $this->state([
            'nome' => $this->faker->firstName,
            'cognome' => $this->faker->lastName,
            'genere' => $this->faker->randomElement(['M', 'F']),
            'eta' => $this->faker->numberBetween(18, 60),
            'email' => $this->faker->unique()->safeEmail,
            'telefono' => $this->faker->unique()->regexify('3[0-9]{9}'),
            'username' => 'useruser',
            'password' => Hash::make('JmoxlJ1q'),
        ]);
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
