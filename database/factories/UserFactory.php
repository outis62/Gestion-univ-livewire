<?php

namespace Database\Factories;

use App\Models\OperationPaysane;
use App\Models\Prospection;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $operationPaysaneIds = OperationPaysane::pluck('id')->toArray();
        $prospectionIds = Prospection::pluck('id')->toArray();

        return [
            'nom' => $this->faker->firstName,
            'prenom' => $this->faker->lastName,
            'statut' => $this->faker->boolean,
            'adresse' => $this->faker->address,
            'email' => $this->faker->unique()->safeEmail,
            'password' => bcrypt('password'),
            'role' => $this->faker->randomElement(['Administrateur', 'Gestionnaire OP']),
            'operation_paysane_id' => $this->faker->randomElement($operationPaysaneIds),
            'prospection_id' => $this->faker->randomElement($prospectionIds),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
