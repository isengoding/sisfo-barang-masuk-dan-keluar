<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Kategori extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_kategori',
        'keterangan',
    ];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? null, function ($query, $search) {
            $query->where('nama_kategori', 'like', '%' . $search . '%');
        });
    }

    /**
     * The barangs that belong to the Kategori
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function barangs(): BelongsToMany
    {
        return $this->belongsToMany(Barang::class);
    }
}
