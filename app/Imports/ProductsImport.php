<?php

namespace App\Imports;

use App\Models\Brand;
use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductsImport implements ToModel, WithHeadingRow
{
    private $rows = 0;

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        ++$this->rows;

        $brand = Brand::where('name', $row['brand']);

        if ($brand->count() == 0) {
            $brand_id = Brand::create(['name' => $row['name']])->id;
        } else {
            $brand_id = $brand->first()->id;
        }

        return new Product([
            'code' => $row['code'],
            'name' => $row['name'],
            'brand_id' => $brand_id,
            'price' => $row['price'],
            'stock' => $row['stock'],
            'description' => $row['description'],
        ]);
    }

    public function getRowCount(): int
    {
        return $this->rows;
    }
}
