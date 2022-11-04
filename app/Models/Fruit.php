<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fruit extends Model
{
    use HasFactory;

    protected $fillable = [
        'fruit_name',
        'image_url',
        'price',
        'decription',
        'brand',
        'created_at',
        'updated_at'
    ];


}