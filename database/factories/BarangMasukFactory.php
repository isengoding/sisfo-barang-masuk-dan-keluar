<?php

namespace Database\Factories;

use App\Models\Pemasok;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BarangMasuk>
 */
class BarangMasukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'no_transaksi' => $this->faker->numberBetween(1, 10),
            'tgl_masuk' => $this->faker->date(),
            'pemasok_id' => Pemasok::factory(),
            'total_qty' => $this->faker->numberBetween(1, 10),
            'total_harga' => $this->faker->numberBetween(1, 10),
        ];
    }
}
