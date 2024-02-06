<?php

namespace Tests\Feature\Http\Controllers;

use Tests\TestCase;
use App\Models\User;
use App\Models\Pemasok;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PemasokControllerTest extends TestCase
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
    public function can_displays_index_view_with_pemasok()
    {
        Pemasok::factory()
            ->count(5)
            ->create();

        $response = $this->get('pemasok');

        $response
            ->assertOk()
            ->assertViewIs('pages.pemasok.index')
            ->assertViewHas('pemasoks');
    }

    /**
     * @test
     */
    public function can_display_create_view_for_pemasok()
    {
        $response = $this->get('pemasok/create');

        $response
            ->assertOk()
            ->assertViewIs('pages.pemasok.create');
    }

    /**
     * @test
     */
    public function can_stores_the_pemasok()
    {

        $newPemasok = Pemasok::factory()
            ->make()
            ->toArray();

        $response = $this->post('/pemasok', $newPemasok);

        $this->assertDatabaseHas('pemasoks', $newPemasok);


        $response
            ->assertRedirect(route('pemasok.index'))
            ->assertSessionHas('success');

    }

    /**
     * @test
     */
    public function can_display_edit_view_for_pemasok()
    {
        $pemasok = Pemasok::factory()->create();

        $response = $this->get(route('pemasok.edit', $pemasok));

        $response
            ->assertOk()
            ->assertViewIs('pages.pemasok.edit')
            ->assertViewHas('pemasok');
    }

    /**
     * @test
     */
    public function can_update_the_pemasok()
    {

        $existingPemasok = Pemasok::factory()->create(['email' => 'email@example.com']);

        $updatePemasok = Pemasok::factory()->make(['email' => 'email@example.com'])->toArray();

        $response = $this->put(route('pemasok.update', $existingPemasok), $updatePemasok);


        $this->assertDatabaseHas('pemasoks', $updatePemasok);

        $response
            ->assertRedirect(route('pemasok.index'))
            ->assertSessionHas('success');
    }

    /**
     * @test
     */
    public function can_deletes_the_pemasok()
    {

        $existingPemasok = Pemasok::factory()->create();

        $response = $this->delete(route('pemasok.destroy', $existingPemasok));

        $response
            ->assertRedirect(route('pemasok.index'))
            ->assertSessionHas('success');

        $this->assertModelMissing($existingPemasok);

    }
}
