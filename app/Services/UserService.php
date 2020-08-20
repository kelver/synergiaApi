<?php


namespace App\Services;

use App\Repositories\UserRepository;

class UserService
{

    private $userRepository = null;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    public function login($parametros)
    {
        return $this->userRepository->login($parametros);
    }

    public function allUser()
    {
        return $this->userRepository->all();
    }

    public function userById($id)
    {
        return $this->userRepository->byId($id);
    }
}
