<?php

namespace Tests\Feature\Http\Controllers;

use Tests\TestCase;
use App\Models\User;
use App\Models\Kategori;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class KategoriControllerTest extends TestCase
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
    public function can_displays_index_view_with_kategori()
    {
        Kategori::factory()
            ->count(5)
            ->create();

        $response = $this->get('kategori');

        $response
            ->assertOk()
            ->assertViewIs('pages.kategori.index')
            ->assertViewHas('kategoris');
    }

    /**
     * @test
     */
    public function can_display_create_view_for_kategori()
    {
        $response = $this->get('kategori/create');

        $response
            ->assertOk()
            ->assertViewIs('pages.kategori.create');
    }

    /**
     * @test
     */
    public function can_stores_the_kategori()
    {

        $newKategori = Kategori::factory()
            ->make()
            ->toArray();

        $response = $this->post('/kategori', $newKategori);

        $this->assertDatabaseHas('kategoris', $newKategori);


        $response
            ->assertRedirect(route('kategori.index'))
            ->assertSessionHas('success');

    }

    /**
     * @test
     */
    public function can_display_edit_view_for_kategori()
    {
        $kategori = Kategori::factory()->create();

        $response = $this->get(route('kategori.edit', $kategori));

        $response
            ->assertOk()
            ->assertViewIs('pages.kategori.edit')
            ->assertViewHas('kategori');
    }

    /**
     * @test
     */
    public function can_update_the_kategori()
    {

        $existingKategori = Kategori::factory()->create();

        $updateKategori = Kategori::factory()->make(['nama_kategori' => 'UpdatedKategori'])->toArray();

        $response = $this->put(route('kategori.update', $existingKategori), $updateKategori);


        $this->assertDatabaseHas('kategoris', $updateKategori);

        $response
            ->assertRedirect(route('kategori.index'))
            ->assertSessionHas('success');
    }

    /**
     * @test
     */
    public function can_deletes_the_kategori()
    {

        $existingKategori = Kategori::factory()->create();

        $response = $this->delete(route('kategori.destroy', $existingKategori));

        $response
            ->assertRedirect(route('kategori.index'))
            ->assertSessionHas('success');

        $this->assertModelMissing($existingKategori);

    }
}
