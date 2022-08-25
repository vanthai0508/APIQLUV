<?php 
namespace App\Repositories;

class CVRepo extends EloquentRepository
{
    public function getModel()
    {
        return cv::class;
    }

    public function create($request)
    {
        
    }

    public function update($array, $id)
    {

    }
}


?>