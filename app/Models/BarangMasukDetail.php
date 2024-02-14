<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BarangMasukDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'barang_masuk_id',
        'barang_id',
        'qty',
        'harga',
        'total_harga',
    ];

    public function scopeFilter($query, array $filters)
    {
        // $query->when($filters['search'] ?? null, function ($query, $search) {
        //     $query->where('nama_barang', 'like', '%' . $search . '%')
        //         ->orWhere('kode', 'like', '%' . $search . '%')
        //         ->orWhere('harga', 'like', '%' . $search . '%')
        //         ->orWhere('stok', 'like', '%' . $search . '%')
        //         ->orWhereHas('satuan', function ($query) use ($search) {
        //             $query->where('nama_satuan', 'like', '%' . $search . '%');
        //         });
        // });

        // Filter results between two dates if 'date_from' and 'date_to' are set in the filters
        $query->when(
            !empty($filters['date_from']) && !empty($filters['date_to']),
            function ($query) use ($filters) {
                $query->whereHas('barangMasuk', function ($query) use ($filters) {
                    $query->whereBetween('tgl_masuk', [$filters['date_from'], $filters['date_to']]);
                    // ->orderBy('tgl_masuk', 'desc');
                });
            }
        );
    }

    /**
     * Get the barangMasuk that owns the BarangMasukDetail
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function barangMasuk(): BelongsTo
    {
        return $this->belongsTo(BarangMasuk::class);
    }

    /**
     * Get the barang that owns the BarangMasukDetail
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function barang(): BelongsTo
    {
        return $this->belongsTo(Barang::class);
    }
}
