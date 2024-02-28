<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;

    public function scopeVisible(Builder $query) {
        return $query->where('visible', 1);
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'category_product', 'category_id', 'product_id');
    }
    public function carts(): BelongsToMany
    {
        return $this->belongsToMany(Cart::class, 'cart_product','cart_id', 'product_id')
            ->withPivot('quantity');
    }
}
