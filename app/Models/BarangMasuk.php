<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BarangMasuk extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_transaksi',
        'tgl_masuk',
        'pemasok_id',
        'total_qty',
        'total_harga',
    ];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? null, function ($query, $search) {
            $query->where('no_transaksi', 'like', '%' . $search . '%')
                ->orWhere('tgl_masuk', 'like', '%' . $search . '%')
                ->orWhereHas('pemasok', function ($query) use ($search) {
                    $query->where('nama_pemasok', 'like', '%' . $search . '%');
                });
        });
    }

    /**
     * Get the pemasok that owns the BarangMasuk
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pemasok(): BelongsTo
    {
        return $this->belongsTo(Pemasok::class);
    }

    /**
     * Get all of the barangMasukDetails for the BarangMasuk
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function barangMasukDetails(): HasMany
    {
        return $this->hasMany(BarangMasukDetail::class);
    }
}
