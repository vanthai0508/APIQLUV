<?php 
namespace App\Repositories;
use App\Models\User;

use App\Repositories\EloquentRepository;

class UserRepo extends EloquentRepository
{
    public function getModel()
    {
        return User::class;
    }

    public function update(array $request, $id)
    {
        
    }

    // public function done($id)
    // {

    // }
    
}


?>