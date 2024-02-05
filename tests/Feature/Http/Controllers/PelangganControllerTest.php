<?php

namespace Tests\Feature\Http\Controllers;

use Tests\TestCase;
use App\Models\User;
use App\Models\Pelanggan;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PelangganControllerTest extends TestCase
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
    public function can_displays_index_view_with_pelanggan()
    {
        Pelanggan::factory()
            ->count(5)
            ->create();

        $response = $this->get('pelanggan');

        $response
            ->assertOk()
            ->assertViewIs('pages.pelanggan.index')
            ->assertViewHas('pelanggans');
    }

    /**
     * @test
     */
    public function can_display_create_view_for_pelanggan()
    {
        $response = $this->get('pelanggan/create');

        $response
            ->assertOk()
            ->assertViewIs('pages.pelanggan.create');
    }

    /**
     * @test
     */
    public function can_stores_the_pelanggan()
    {

        $newPelanggan = Pelanggan::factory()
            ->make()
            ->toArray();

        $response = $this->post('/pelanggan', $newPelanggan);

        $this->assertDatabaseHas('pelanggans', $newPelanggan);


        $response
            ->assertRedirect(route('pelanggan.index'))
            ->assertSessionHas('success');

    }

    /**
     * @test
     */
    public function can_display_edit_view_for_pelanggan()
    {
        $pelanggan = Pelanggan::factory()->create();

        $response = $this->get(route('pelanggan.edit', $pelanggan));

        $response
            ->assertOk()
            ->assertViewIs('pages.pelanggan.edit')
            ->assertViewHas('pelanggan');
    }

    /**
     * @test
     */
    public function can_update_the_pelanggan()
    {

        $existingPelanggan = Pelanggan::factory()->create(['email' => 'bLlOq@example.com']);

        $updatePelanggan = Pelanggan::factory()->make(['email' => 'bLlOq@example.com'])->toArray();

        $response = $this->put(route('pelanggan.update', $existingPelanggan), $updatePelanggan);


        $this->assertDatabaseHas('pelanggans', $updatePelanggan);

        $response
            ->assertRedirect(route('pelanggan.index'))
            ->assertSessionHas('success');
    }

    /**
     * @test
     */
    public function can_deletes_the_pelanggan()
    {

        $existingPelanggan = Pelanggan::factory()->create();

        $response = $this->delete(route('pelanggan.destroy', $existingPelanggan));

        $response
            ->assertRedirect(route('pelanggan.index'))
            ->assertSessionHas('success');

        $this->assertModelMissing($existingPelanggan);

    }
}
