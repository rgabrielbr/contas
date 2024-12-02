<?php

namespace Database\Factories;

use App\Enums\MovimentacaoTipo;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movimentacao>
 */
class MovimentacaoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => fake()->name(),
            'descricao' => fake()->name(),
            'data' => fake()->dateTimeBetween('-1 year'),
            'valor' => rand(100, 100000),
            'tipo' => Arr::random(MovimentacaoTipo::names()),
        ];
    }
}
