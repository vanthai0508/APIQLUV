<?php
namespace App\service;

use App\Repositories\UserRepo;
use App\Repositories\UserRepositoryInterface;
use Exception;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }


    public function list()
    {
        try {
            return $this->repo->list();
        } catch(Exception $e) {
            return null;
        }
    }

    public function update(array $data)
    {
        try {
            return $this->userRepository->update($data['id'], $data);
        } catch(Exception $e) {
            return null;
        }
    }

    public function getAllUser()
    {
        try {
            return $this->userRepository->getAll();
        } catch(Exception $e) {
            return null;
        }
    }
}



?>