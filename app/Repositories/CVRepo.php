<?php 
namespace App\Repositories;

class CVRepo extends EloquentRepository
{
    public function getModel()
    {
        return cv::class;
    }
}


?>