<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BarangKeluarDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'barang_keluar_id',
        'barang_id',
        'qty',
        'harga',
        'total_harga',
    ];

    /**
     * Get the barangKeluar that owns the BarangKeluarDetail
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function barangKeluar(): BelongsTo
    {
        return $this->belongsTo(BarangKeluar::class);
    }

    /**
     * Get the barang that owns the BarangKeluarDetail
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function barang(): BelongsTo
    {
        return $this->belongsTo(Barang::class);
    }

    public function scopeFilter($query, array $filters)
    {

        // Filter results between two dates if 'date_from' and 'date_to' are set in the filters
        $query->when(
            !empty($filters['date_from']) && !empty($filters['date_to']),
            function ($query) use ($filters) {
                $query->whereHas('barangKeluar', function ($query) use ($filters) {
                    $query->whereBetween('tgl_keluar', [$filters['date_from'], $filters['date_to']]);
                    // ->orderBy('created_at', 'desc')
                });
            }
        );
    }
}
