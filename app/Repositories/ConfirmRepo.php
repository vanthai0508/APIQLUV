<?php 
namespace App\Repositories;
use App\Models\confirm;

class ConfirmRepo extends EloquentRepository
{
    public function getModel()
    {
        return confirm::class;
    }

    public function update(array $request, $id)
    {

    }
}


?>