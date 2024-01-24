<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Image;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ImageControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $user;

    public function setUp(): void
    {
        parent::setUp();

        // Create a user instance for the tests
        $this->user = User::factory()->create();

        $this->actingAs($this->user);
    }

    public function testStore()
    {
        $this->withoutExceptionHandling();
        Storage::fake('public');
        $newFilename = 'test.jpg';

        // create temporary file
        $response = $this->post('/upload', [
            'path' => UploadedFile::fake()->image($newFilename)
        ]);

        // when user click upload button
        $response2 = $this->post('/images', [
            'path' => $response->getContent()
        ]);

        $response2
            ->assertRedirect(route('images.create'))
            ->assertSessionHas('success');

        $newFile = 'images/' . Str::after($response->getContent(), 'tmp/');

        $this->assertDatabaseHas('images', [
            'path' => $newFile,
        ]);

        Storage::disk('public')->assertExists($newFile);



    }
}
