<?php

namespace Database\Factories;

use App\Models\Barang;
use App\Models\BarangMasuk;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BarangMasukDetail>
 */
class BarangMasukDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'barang_masuk_id' => BarangMasuk::factory(),
            'barang_id' => Barang::factory(),
            'qty' => $this->faker->numberBetween(1, 10),
            'harga' => $this->faker->numberBetween(1, 10),
            'total_harga' => $this->faker->numberBetween(1, 10),
        ];
    }
}
