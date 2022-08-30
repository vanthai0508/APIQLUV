<?php 
namespace App\Repositories;
use App\Models\confirm;
use Illuminate\Support\Facades\Auth;

class ConfirmRepo extends EloquentRepository
{
    public function getModel()
    {
        return confirm::class;
    }

    public function update(array $request, $id)
    {

    }

    // letter confirm from admin
    public function letterConfirm()
    {
        $idUser = Auth::user()->id;
        return $this->model->where('id_user', $idUser)->first();
    }

    // confirm of user
    public function userConfirm()
    {
        $idUser = Auth::user()->id;
        $this->model->where('id_user', $idUser)->update(['status' => 0]);

    }

    //list user confirmed
    public function listUserParticipationInterview()
    {
        return $this->model->where('status', 0)->get();
    }
}


?>