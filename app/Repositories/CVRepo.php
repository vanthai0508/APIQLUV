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

    public function getUser($id)
    {
        $cv = $this->model->find($id);
        return $cv->user;
    }

    public function done($id)
    {
        $this->model->where('id', $id)->update(['status' => 0]);
    }

    public function update(array $request, $id)
    {
         $this->model->where('id', $id)->update(['status' => 0]);
    }
    // public function create(array $request)
    // {
    //     return $this->model->create($request);
    // }

    // public function find($id)
    // {
    //     return $this->model->find($id);
    // }
}


?>