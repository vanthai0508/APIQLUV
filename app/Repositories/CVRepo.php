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

    // get user
    public function getUser($id)
    {
        $cv = $this->model->find($id);
        return $cv->user;
    }

    //change status
    public function done($id)
    {
        $this->model->where('id', $id)->update(['status' => 0]);
    }

    public function update(array $request, $id)
    {
      //   $this->model->where('id', $id)->update(['status' => 0]);
    }

    // create value confirm

    public function valueConfirm($id)
    {
        $date = date('y-m-d h:i:s');

        $dateInter = strtotime ('+2 day', strtotime ( $date) ) ;

        $dateInterview = date("y-m-d h:i:s", $dateInter);
        $request['dateinterview']=$dateInterview;
        $cv = $this->find($id);
        $data['dateinterview']=$dateInterview;

        $data['id_user'] = $cv->id_user;
        $data['id_cv'] = $cv->id;
        $data['name'] = $cv->name;

        $data['phone'] = $cv->phone;

        $data['position'] = $cv->position;

        return $data;

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