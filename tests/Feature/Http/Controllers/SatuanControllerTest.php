<?php

namespace Tests\Feature\Http\Controllers;

use Tests\TestCase;
use App\Models\User;
use App\Models\Satuan;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SatuanControllerTest extends TestCase
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
    public function can_displays_index_view_with_satuan()
    {
        Satuan::factory()
            ->count(5)
            ->create();

        $response = $this->get('satuans');

        $response
            ->assertOk()
            ->assertViewIs('pages.satuans.index')
            ->assertViewHas('satuans');
    }

    /**
     * @test
     */
    public function can_display_create_view_for_satuan()
    {
        $response = $this->get('satuans/create');

        $response
            ->assertOk()
            ->assertViewIs('pages.satuans.create');
    }

    /**
     * @test
     */
    public function can_stores_the_satuan()
    {

        $newProduct = Satuan::factory()
            ->make()
            ->toArray();

        $response = $this->post('/satuans', $newProduct);

        $this->assertDatabaseHas('satuans', $newProduct);


        $response
            ->assertRedirect(route('satuans.index'))
            ->assertSessionHas('success');

    }

    /**
     * @test
     */
    public function can_display_edit_view_for_satuan()
    {
        $satuan = Satuan::factory()->create();

        $response = $this->get(route('satuans.edit', $satuan));

        $response
            ->assertOk()
            ->assertViewIs('pages.satuans.edit')
            ->assertViewHas('satuan');
    }

    /**
     * @test
     */
    public function can_update_the_satuan()
    {

        $existingSatuan = Satuan::factory()->create();

        $updateSatuan = Satuan::factory()->make()->toArray();

        $response = $this->put(route('satuans.update', $existingSatuan), $updateSatuan);


        $this->assertDatabaseHas('satuans', $updateSatuan);

        $response
            ->assertRedirect(route('satuans.index'))
            ->assertSessionHas('success');
    }

    /**
     * @test
     */
    public function can_deletes_the_satuan()
    {

        $existingSatuan = Satuan::factory()->create();

        $response = $this->delete(route('satuans.destroy', $existingSatuan));

        $response
            ->assertRedirect(route('satuans.index'))
            ->assertSessionHas('success');

        $this->assertModelMissing($existingSatuan);

    }
}
