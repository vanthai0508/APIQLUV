<?php 
namespace App\Repositories;
use App\Models\cv;

class CVRepo extends EloquentRepository
{
    public function getModel()
    {
        return cv::class;
    }

    // public function create($request)
    // {
    //     $this->
    // }

    public function update($array, $id)
    {

    }
    // public function create(array $request)
    // {
    //     return $this->model->create($request);
    // }
}


?>