<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class confirm extends Model
{
    use HasFactory;

    protected $table = 'confirm';

    protected $fillable = [
        'dateinterview',
        'id_user',
        'id_cv',
        'id_xn',
        'status'
    ];

    public function cv()
    {
        return $this->belongsTo('App\Models\cv', 'id_cv');
    }

}
