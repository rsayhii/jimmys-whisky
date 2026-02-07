<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'brand',
        'category',
        'sku',
        'price',
        'qty',
        'status',
        'stock_status',
        'short_description',
        'description',
        'top_notes',
        'heart_notes',
        'base_notes',
        'scent_family',
        'concentration',
        'gender',
        'season',
        'image',
        'variants',
        'discount_price',
        'taxable',
        'collection',
        'tags',
    ];

    protected $casts = [
        'taxable' => 'boolean',
    ];

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class)->orderBy('sort_order');
    }
}
