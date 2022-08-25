<?php 
namespace App\Repositories;

class ConfirmRepo extends EloquentRepository
{
    public function getModel()
    {
        return confirm::class;
    }
}


?>