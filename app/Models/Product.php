<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'brand_id',
        'price',
        'stock',
        'description',
        'image'
    ];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? null, function ($query, $search) {
            $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('code', 'like', '%' . $search . '%')
                ->orWhere('price', 'like', '%' . $search . '%')
                ->orWhere('stock', 'like', '%' . $search . '%')
                ->orWhereHas('brand', function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%');
                });
        });

        // $query->when($filters['route_id'] ?? null, function ($query, $route_id) {
        //     $query->where('id', $route_id);
        // });

        // $query->when($filters['transportation_id'] ?? null, function ($query, $transportation_id) {
        //     $query->where('transportation_id', $transportation_id);
        // });

        // $query->when($filters['time_departure'] ?? null, function ($query, $time_departure) {
        //     $query->where('time_departure', 'like', '%' . $time_departure . '%');
        // });
    }

    /**
     * Get the brand that owns the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    protected function imageBase64(): Attribute
    {
        $imagePath = public_path('storage/' . $this->image);
        return Attribute::make(
            get: fn() => base64_encode(file_get_contents($imagePath)),
        );
    }

    /**
     * Get the base64 encoded image.
     *
     * @return string
     */
    public function getImageBaseAttribute(): string
    {
        // $imagePath = storage_path('app/public/' . $this->image);
        $imagePath = public_path('storage/' . $this->image);
        return base64_encode(file_get_contents($imagePath));
    }


}
