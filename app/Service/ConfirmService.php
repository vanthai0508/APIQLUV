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

    public function done($id)
    {
        $this->repo->done($id);
    }
}
?>