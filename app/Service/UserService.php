<?php
namespace App\service;

use App\Repositories\UserRepo;
use Exception;

class UserService
{
    public $repo;

    public function __construct(UserRepo $repo)
    {
        $this->repo = $repo;
    }


    public function list()
    {
        try {
            return $this->repo->list();
        } catch(Exception $e) {
            return null;
        }
    }
}



?>