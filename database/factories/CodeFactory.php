<?php

namespace Database\Factories;

use App\Models\Code;
use App\Models\User; // Assurez-vous d'importer le modèle User
use Illuminate\Database\Eloquent\Factories\Factory;
use Psy\Util\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Code>
 */
class CodeFactory extends Factory
{
    protected $model = Code::class;


    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
       return[
           'code' => Str::upper(fake()->bothify('????-3333-????')),
           'host_id' => User::factory(),
           'guest_id' => null,
           'consumed_at' => null,
       ];
    }

    public function consumed() :Factory
    {
        return $this->state(function (array $attributes) {
            return[
                'guest_id' => User::factory(),
                'consumed_at' => fake()->dateTimeThisMonth(),
            ];
        });
    }
}
