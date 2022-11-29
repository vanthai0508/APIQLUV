<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'date',
        'address',
        'total_bill',
        'status',
        'created_at',
        'updated_at'
    ];

    public function OrderDetail()
    {
        return $this->hasOne(OrderDetail::class);
    }

    public function ShoppingCart()
    {
        return $this->hasOne(ShoppingCart::class);
    }

    
}