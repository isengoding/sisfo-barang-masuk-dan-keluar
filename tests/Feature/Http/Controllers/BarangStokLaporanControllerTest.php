<?php

namespace Tests\Feature\Http\Controllers;

use Tests\TestCase;
use App\Models\User;
use App\Models\Barang;
use App\Models\BarangMasukDetail;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BarangStokLaporanControllerTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        // Create a user instance for the tests
        $user = User::factory()->create();

        $this->actingAs($user);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function can_displays_index_view_with_data_barang()
    {
        $barang = Barang::factory()->create();

        $barangMasukDetail = BarangMasukDetail::factory()->create([
            'barang_id' => $barang->id,
            'qty' => 10,
        ]);
        $barangMasukDetail2 = BarangMasukDetail::factory()->create([
            'barang_id' => $barang->id,
            'qty' => 10,
        ]);

        $response = $this->get('barang/stok/laporan');

        $response
            ->assertOk()
            ->assertViewIs('pages.barang.laporan.stok')
            ->assertViewHas('barangs');
    }
}
