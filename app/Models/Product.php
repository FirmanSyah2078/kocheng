<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Number;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'sku', 'name', 'slug', 'describtion', 'price', 'stock', 'image_url', 'status'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    protected function formattedPrice(): Attribute
    {
        return Attribute::make(
            get: fn () => Number::currency($this->price, in: 'IDR', locale: 'id'),
        );
    }
}
