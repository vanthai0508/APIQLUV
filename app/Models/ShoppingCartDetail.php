<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingCartDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'shopping_cart_id',
        'fruit_id',
        'quantity',
        'created_at',
        'updated_at'
    ];

    public function ShoppingCart()
    {
        return $this->belongsTo(ShoppingCart::class, 'shopping_cart_id', 'id');
    }
}