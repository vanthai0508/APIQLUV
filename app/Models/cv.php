<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Symfony\Contracts\Service\Attribute\Required;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\Auth;

class cv extends Model
{
    use HasFactory;
    use HasApiTokens;
    
    
    protected $table = 'cv';
    
   
  
  //  protected $fillable = ['title'];
  protected $fillable = [
        'name',
        'position',
        'phone',
        'file',
        'id_user',
        
        
        
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