<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'order_id',
        'created_at',
        'updated_at'
    ];

    public function ShoppingCartDetail()
    {
        return $this->hasMany(ShoppingCartDetail::class);
    }
    
    public function User()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    
    public function Order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }
    
}