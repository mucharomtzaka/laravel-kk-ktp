<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\KartuKeluarga;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\KartuKeluarga>
 */
class KartuKeluargaFactory extends Factory
{

    protected $model = KartuKeluarga::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'nomor_kk' => $this->faker->numerify('################'),
            'kepala_keluarga' => $this->faker->name(),
            'alamat' => $this->faker->address(),
        ];
    }
}
