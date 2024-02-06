<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Kategori;
use Tests\TestCase;
use App\Models\User;
use App\Models\Barang;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BarangControllerTest extends TestCase
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
    public function can_displays_index_view_with_barang()
    {
        Barang::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('barang.index'));

        $response
            ->assertOk()
            ->assertViewIs('pages.barang.index')
            ->assertViewHas('barangs');
    }

    /**
     * @test
     */
    public function can_display_create_view_for_barang()
    {
        $response = $this->get('barang/create');

        $response
            ->assertOk()
            ->assertViewIs('pages.barang.create')
            ->assertViewHas('satuans')
            ->assertViewHas('kategoris');
    }

    /**
     * @test
     */
    public function can_stores_the_barang()
    {

        $newBarang = Barang::factory()
            ->make(['gambar' => ""])
            ->toArray();

        $kategori = Kategori::factory(2)->create();

        $newBarang['kategori_id'] = $kategori->pluck('id', 'id')->toArray();

        // dd($newBarang);

        $response = $this->post(route('barang.store'), $newBarang);

        $this->assertDatabaseHas('barangs', [
            'nama_barang' => $newBarang['nama_barang'],
            'kode' => $newBarang['kode'],
            'satuan_id' => $newBarang['satuan_id'],
            'stok' => $newBarang['stok'],
            'min_stok' => $newBarang['min_stok'],
            'harga' => $newBarang['harga'],
            'keterangan' => $newBarang['keterangan'],
        ]);

        $this->assertDatabaseHas('barang_kategori', [
            'kategori_id' => $kategori[0]->id,
            'kategori_id' => $kategori[1]->id,
            'barang_id' => Barang::get()->first()->id,
        ]);



        $response
            ->assertRedirect(route('barang.index'))
            ->assertSessionHas('success');

    }

    /**
     * @test
     */
    public function can_display_edit_view_for_barang()
    {
        $barang = Barang::factory()->create();

        $response = $this->get(route('barang.edit', $barang));

        $response
            ->assertOk()
            ->assertViewIs('pages.barang.edit')
            ->assertViewHas('barang')
            ->assertViewHas('satuans')
            ->assertViewHas('kategoris');
    }

    /**
     * @test
     */
    public function can_updates_the_barang()
    {
        $existingBarang = Barang::factory()
            ->hasAttached(Kategori::factory(2)->create())
            ->create();

        $updateBarang = Barang::factory()->make()->toArray();

        $kategoris = Kategori::factory(2)->create();
        $updateBarang['kategori_id'] = $kategoris->pluck('id', 'id')->toArray();

        $response = $this->put(route('barang.update', $existingBarang), $updateBarang);


        $this->assertDatabaseHas('barangs', [
            'nama_barang' => $updateBarang['nama_barang'],
            'kode' => $updateBarang['kode'],
            'satuan_id' => $updateBarang['satuan_id'],
            'stok' => $updateBarang['stok'],
            'min_stok' => $updateBarang['min_stok'],
            'harga' => $updateBarang['harga'],
            'keterangan' => $updateBarang['keterangan'],
        ]);

        $this->assertDatabaseHas('barang_kategori', [
            'kategori_id' => $kategoris[0]->id,
            'kategori_id' => $kategoris[1]->id,
            'barang_id' => Barang::get()->first()->id,
        ]);

        $response
            ->assertRedirect('/barang')
            ->assertSessionHas('success');
    }

    /**
     * @test
     */
    public function can_deletes_the_Barang()
    {
        // Storage::fake('public');

        $existingBarang = Barang::factory()
            ->hasAttached(Kategori::factory(3)->create())
            ->create();


        $response = $this->delete(route('barang.destroy', $existingBarang));

        $response
            ->assertRedirect(route('barang.index'))
            ->assertSessionHas('success');

        $this->assertModelMissing($existingBarang);

        $this->assertDatabaseMissing('barang_kategori', [
            'barang_id' => $existingBarang->id
        ]);
        // Storage::disk('public')->assertMissing($existingProduct->front_cover);
        // Storage::disk('public')->assertMissing($existingProduct->back_cover);
    }



}
