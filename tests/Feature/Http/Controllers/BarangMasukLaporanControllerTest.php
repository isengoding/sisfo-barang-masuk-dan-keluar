<?php

namespace Tests\Feature\Http\Controllers;

use Tests\TestCase;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BarangMasukLaporanControllerTest extends TestCase
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
    public function can_displays_index_view_with_barang_masuk_detail()
    {

        $response = $this->get('barang-masuk/laporan');

        $response
            ->assertOk()
            ->assertViewIs('pages.barang-masuk.laporan.index')
            ->assertViewHas('barangMasukDetails');
    }

    /**
     * @test
     */
    public function can_download_laporan_barang_masuk_pdf()
    {

        // Barang::factory()->create();

        $response = $this->get('barang-masuk/laporan/pdf');


        $this->assertNotEmpty($response->getContent());
        $this->assertEquals('application/pdf', $response->headers->get('Content-Type'));
        $this->assertEquals(
            'inline; filename="laporan-barang-masuk.pdf"',
            $response->headers->get('Content-Disposition')
        );

    }

    /**
     * @test
     */
    public function can_download_laporan_barang_masuk_excel()
    {
        Excel::fake();

        $this->get('barang-masuk/laporan/excel');

        Excel::assertDownloaded('laporan-barang-masuk.xls');
    }
}
