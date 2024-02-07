<?php

namespace Database\Factories;

use App\Models\Satuan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Barang>
 */
class BarangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_barang' => $this->faker->word(),
            'kode' => time() . '-' . $this->faker->unique()->word(),
            'satuan_id' => Satuan::factory(),
            'stok' => $this->faker->numberBetween(1, 100),
            'min_stok' => $this->faker->numberBetween(1, 100),
            'harga' => $this->faker->numberBetween(1, 1000),
            'gambar' => "gambar/default.png",
            'keterangan' => $this->faker->sentence(),
        ];
    }
}
