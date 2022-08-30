<?php
namespace App\service;

use App\Repositories\ConfirmRepo;
class ConfirmService 
{
    protected $repo;

    public function __construct(ConfirmRepo $repo)
    {
        $this->repo = $repo;
    }

    // create confirm
    public function create(array $request)
    {
        $date = date('y-m-d h:i:s');

        $dateInter = strtotime ('+2 day', strtotime ( $date) ) ;

        $dateInterview = date("y-m-d h:i:s", $dateInter);
        $request['dateinterview']=$dateInterview;
        $this->repo->create($request);
    }

    // list confirm
    public function list()
    {
        return  $this->repo->list();
    }

    //change status

    public function done($id)
    {
        $this->repo->done($id);
    }

    // letter confirm from admin
    public function letterConfirm()
    {
        return $this->repo->letterConfirm();
    }

    // confirm of user
    public function userConfirm()
    {
        $this->repo->userConfirm();
    }

    //list user confirmed
    public function listUserParticipationInterview()
    {
        return $this->repo->listUserParticipationInterview();
    }
}
?>