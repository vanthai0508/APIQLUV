<?php
namespace App\service;

use App\Repositories\UserRepo;

class UserService
{
    public $repo;

    public function __construct(UserRepo $repo)
    {
        $this->repo = $repo;
    }

    public function list()
    {
        return $this->repo->list();
    }
}



?>