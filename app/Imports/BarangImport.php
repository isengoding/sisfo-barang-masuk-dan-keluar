<?php

namespace App\Imports;

use App\Models\Barang;
use App\Models\Satuan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BarangImport implements ToModel, WithHeadingRow
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

        $satuan = Satuan::where('nama_satuan', $row['satuan']);

        if ($satuan->count() == 0) {
            $satuan_id = Satuan::create(['nama_satuan' => $row['satuan']])->id;
        } else {
            $satuan_id = $satuan->first()->id;
        }

        return new Barang([
            'kode' => $row['kode'],
            'nama_barang' => $row['nama_barang'],
            'satuan_id' => $satuan_id,
            'harga' => $row['harga'],
            'stok' => $row['stok'],
            'min_stok' => $row['min_stok'],
            'keterangan' => $row['keterangan'],
        ]);
    }

    public function getRowCount(): int
    {
        return $this->rows;
    }
}
