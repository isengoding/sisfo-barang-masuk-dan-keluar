<?php

namespace Tests\Feature\Http\Controllers;

use Tests\TestCase;
use App\Models\User;
use App\Imports\BarangImport;
use Illuminate\Http\UploadedFile;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BarangImportControllerTest extends TestCase
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
    public function can_display_create_view_for_import_barang()
    {
        $response = $this->get('barang/import');

        $response
            ->assertOk()
            ->assertViewIs('pages.barang.import');
    }

    /**
     * @test
     */
    public function can_import_barang()
    {
        Excel::fake();

        $this->post('/barang/import', [
            'file' => UploadedFile::fake()->create('filename.xlsx'),
        ]);

        Excel::assertImported('filename.xlsx');

        Excel::assertImported('filename.xlsx', function (BarangImport $import) {
            return true;
        });
    }
}
