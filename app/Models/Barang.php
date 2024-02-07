<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_barang',
        'kode',
        'satuan_id',
        'stok',
        'min_stok',
        'harga',
        'gambar',
        'keterangan',
    ];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? null, function ($query, $search) {
            $query->where('nama_barang', 'like', '%' . $search . '%')
                ->orWhere('kode', 'like', '%' . $search . '%')
                ->orWhere('harga', 'like', '%' . $search . '%')
                ->orWhere('stok', 'like', '%' . $search . '%')
                ->orWhereHas('satuan', function ($query) use ($search) {
                    $query->where('nama_satuan', 'like', '%' . $search . '%');
                });
        });
    }

    /**
     * Get the satuan that owns the Barang
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function satuan(): BelongsTo
    {
        return $this->belongsTo(Satuan::class);
    }

    /**
     * The kategoris that belong to the Barang
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function kategoris(): BelongsToMany
    {
        return $this->belongsToMany(Kategori::class);
    }

    protected function imageBase64(): Attribute
    {
        $gambarPath = public_path('storage/' . $this->gambar);
        return Attribute::make(
            get: fn() => base64_encode(file_get_contents($gambarPath)),
        );
    }
}
