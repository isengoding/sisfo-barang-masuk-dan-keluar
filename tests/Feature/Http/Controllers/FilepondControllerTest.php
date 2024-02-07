<?php

namespace Tests\Feature\Http\Controllers;

use Tests\TestCase;
use App\Models\User;
use App\Models\Barang;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FilepondControllerTest extends TestCase
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

    /** @test */
    public function can_upload_file_to_tmp_folder()
    {
        Storage::fake('public');


        $response = $this->post('/filepond', [
            'gambar' => UploadedFile::fake()->image('filename.jpg'),
        ]);


        Storage::disk('public')->assertExists($response->getContent());
    }


    /** @test */
    public function can_delete_file_from_tmp_folder()
    {
        Storage::fake('public');

        $response = $this->post('/filepond', [
            'gambar' => UploadedFile::fake()->image('filename.jpg'),
        ]);

        $this->call('DELETE', '/filepond', [], [], [], [], $response->getContent());

        Storage::disk('public')->assertMissing($response->getContent());
    }
}
