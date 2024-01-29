<?php

namespace Tests\Feature\Http\Controllers;

use Tests\TestCase;
use App\Models\User;
use App\Models\Product;
use App\Exports\ProductsExport;
use App\Imports\ProductsImport;
use Illuminate\Http\UploadedFile;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductControllerTest extends TestCase
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
    public function can_displays_index_view_with_product()
    {
        Product::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('products.index'));

        $response
            ->assertOk()
            ->assertViewIs('products.index')
            ->assertViewHas('products');
    }

    /**
     * @test
     */
    public function can_display_create_view_for_product()
    {
        $response = $this->get(route('products.create'));

        $response
            ->assertOk()
            ->assertViewIs('products.create')
            ->assertViewHas('brands');
    }

    /**
     * @test
     */
    public function can_stores_the_product()
    {

        $newProduct = Product::factory()
            ->make(['image' => ""])
            ->toArray();

        $response = $this->post(route('products.store'), $newProduct);

        $this->assertDatabaseHas('products', [
            'name' => $newProduct['name'],
            'code' => $newProduct['code'],
            'brand_id' => $newProduct['brand_id'],
            'stock' => $newProduct['stock'],
            'price' => $newProduct['price'],
            'description' => $newProduct['description'],
        ]);


        $response
            ->assertRedirect(route('products.index'))
            ->assertSessionHas('success');

    }

    /**
     * @test
     */
    public function can_display_edit_view_for_product()
    {
        $product = Product::factory()->create();

        $response = $this->get(route('products.edit', $product));

        $response
            ->assertOk()
            ->assertViewIs('products.edit')
            ->assertViewHas('brands');
    }

    /**
     * @test
     */
    public function can_updates_the_product()
    {

        $existingProduct = Product::factory()->create();

        $updateProduct = Product::factory()->make()->toArray();

        $response = $this->put(route('products.update', $existingProduct), $updateProduct);


        $this->assertDatabaseHas('Products', [
            'name' => $updateProduct['name'],
            'code' => $updateProduct['code'],
            'brand_id' => $updateProduct['brand_id'],
            'stock' => $updateProduct['stock'],
            'price' => $updateProduct['price'],
            'description' => $updateProduct['description'],
        ]);

        $response
            // ->assertRedirect(route('products.create'))
            ->assertSessionHas('success');
    }

    /**
     * @test
     */
    public function can_deletes_the_product()
    {
        Storage::fake('public');

        $existingProduct = Product::factory()->create();

        $response = $this->delete(route('products.destroy', $existingProduct));

        $response
            ->assertRedirect(route('products.index'))
            ->assertSessionHas('success');

        $this->assertModelMissing($existingProduct);

        // Storage::disk('public')->assertMissing($existingProduct->front_cover);
        // Storage::disk('public')->assertMissing($existingProduct->back_cover);
    }


    /**
     * @test
     */
    public function can_download_products_pdf()
    {

        Product::factory()->create();

        $response = $this->get('products/pdf');


        $this->assertNotEmpty($response->getContent());
        $this->assertEquals('application/pdf', $response->headers->get('Content-Type'));
        $this->assertEquals(
            'attachment; filename="laporan-produk.pdf"',
            $response->headers->get('Content-Disposition')
        );

    }

    /**
     * @test
     */
    public function can_download_product_excel()
    {
        Excel::fake();

        Product::factory()->create([
            'name' => 'Product 1',
        ]);

        $this->get('/products/excel');

        Excel::assertDownloaded('data-product.xls');
    }

    /**
     * @test
     */
    public function can_import_products()
    {
        Excel::fake();

        $this->post('/products/import', [
            'file' => UploadedFile::fake()->create('filename.xlsx'),
        ]);

        Excel::assertImported('filename.xlsx');

        Excel::assertImported('filename.xlsx', function (ProductsImport $import) {
            return true;
        });
    }


}
