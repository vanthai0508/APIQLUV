<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Symfony\Contracts\Service\Attribute\Required;

class cv extends Model
{
    use HasFactory;
    
    protected $table = 'cv';

    public $atributes = [
        'status' => 1
    ];
  //  protected $fillable = ['title'];

    protected $fillabel = [
        'name' ,
        'position',
        'phone',
        'file',
        'id_user',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User','id_user');
    }

    public function confirm()
    {
        return $this->hasOne('App\Models\confirm', 'id_cv', 'id');
    }

    
}