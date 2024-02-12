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
