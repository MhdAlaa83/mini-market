<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'category',
        'price',
        'stock',
        'is_active',
        'image_url', // stores relative path like "products/uuid.jpg"
    ];

    protected $casts = [
        'price'     => 'decimal:2',
        'is_active' => 'boolean',
    ];

    protected static function booted()
    {
        static::creating(function (Product $product) {
            if (empty($product->slug)) {
                $product->slug = Str::slug($product->name) . '-' . Str::random(5);
            }
        });

        static::updating(function (Product $product) {
            if ($product->isDirty('name')) {
                $product->slug = Str::slug($product->name) . '-' . Str::random(5);
            }
        });
        
    }
    public function getImageWebUrlAttribute(): string
    {
    return $this->image_url
        ? Storage::url($this->image_url)          // /storage/products/...
        : asset('img/product-placeholder.png');   // put a placeholder here
    }
    public function getCategoryColorClassAttribute(): string
    {
    return match (strtolower($this->category)) {
        'snacks'       => 'bg-warning text-dark',   // yellow
        'beverages'    => 'bg-info text-dark',      // cyan
        'groceries'    => 'bg-success',             // green
        'household'    => 'bg-primary',             // blue
        'personal care'=> 'bg-danger',              // red
        default        => 'bg-secondary',           // gray fallback
    };
}
}
