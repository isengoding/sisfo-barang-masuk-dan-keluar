<?php

namespace Tests\Feature\Http\Controllers;

use Tests\TestCase;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BarangKeluarLaporanControllerTest extends TestCase
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
    public function can_displays_index_view_with_barang_keluar_detail()
    {

        $response = $this->get('barang-keluar/laporan');

        $response
            ->assertOk()
            ->assertViewIs('pages.barang-keluar.laporan.index')
            ->assertViewHas('barangKeluarDetails');
    }

    /**
     * @test
     */
    public function can_download_laporan_barang_keluar_pdf()
    {

        // Barang::factory()->create();

        $response = $this->get('barang-keluar/laporan/pdf');


        $this->assertNotEmpty($response->getContent());
        $this->assertEquals('application/pdf', $response->headers->get('Content-Type'));
        $this->assertEquals(
            'inline; filename="laporan-barang-keluar.pdf"',
            $response->headers->get('Content-Disposition')
        );

    }

    /**
     * @test
     */
    public function can_download_laporan_barang_keluar_excel()
    {
        Excel::fake();

        $this->get('barang-keluar/laporan/excel');

        Excel::assertDownloaded('laporan-barang-keluar.xls');
    }
}
