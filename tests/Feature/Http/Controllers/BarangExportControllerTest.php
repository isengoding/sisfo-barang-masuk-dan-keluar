<?php

namespace Tests\Feature\Http\Controllers;

use Tests\TestCase;
use App\Models\User;
use App\Models\Barang;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BarangExportControllerTest extends TestCase
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
    public function can_download_barang_pdf()
    {

        Barang::factory()->create();

        $response = $this->get('barang/pdf');


        $this->assertNotEmpty($response->getContent());
        $this->assertEquals('application/pdf', $response->headers->get('Content-Type'));
        $this->assertEquals(
            'inline; filename="laporan-data-barang.pdf"',
            $response->headers->get('Content-Disposition')
        );

    }

    /**
     * @test
     */
    public function can_download_barang_excel()
    {
        Excel::fake();

        Barang::factory()->create();

        $this->get('/barang/excel');

        Excel::assertDownloaded('data-barang.xls');
    }
}
