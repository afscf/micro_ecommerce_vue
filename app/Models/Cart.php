<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Cart extends Model
{
    use HasFactory;
    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'user_id');
    }
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'cart_product','product_id', 'cart_id')
            ->withPivot('quantity');
    }
}
