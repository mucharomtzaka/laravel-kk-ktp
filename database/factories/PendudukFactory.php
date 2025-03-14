<?php

namespace Database\Factories;
use App\Models\Penduduk;
use App\Models\KartuKeluarga;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Penduduk>
 */
class PendudukFactory extends Factory
{
    protected $model = Penduduk::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'kartu_keluarga_id' => KartuKeluarga::factory(), // Menghubungkan dengan KK
            'nik' => $this->faker->unique()->numerify('320123456789####'),
            'nama' => $this->faker->name(),
            'tempat_lahir' => $this->faker->city(),
            'tanggal_lahir' => $this->faker->date('Y-m-d'),
            'jenis_kelamin' => $this->faker->randomElement(['Laki-laki', 'Perempuan']),
            'agama' => $this->faker->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu']),
            'pekerjaan' => $this->faker->jobTitle(),
        ];
    }
}
