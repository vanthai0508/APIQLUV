<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class confirm extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'confirm';

    protected $fillable = [
        'dateinterview',
        'id_user',
        'id_cv',
        'name',
        'phone',
        'position',
        'status'
    ];

    public function cv()
    {
        return $this->belongsTo('App\Models\cv', 'id_cv');
    }

}
