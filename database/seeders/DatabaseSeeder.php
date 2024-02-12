<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Kategori;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\Product::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Jenniya',
            'email' => 'admin@admin.com',
        ]);

        \App\Models\Barang::factory(11)->hasAttached(Kategori::factory(1)->create())->create();
    }
}
