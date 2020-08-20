<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $userService = null;

    public function __construct()
    {
        $this->userService = new UserService();
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $parametros = $request->all();

        $login = $this->userService->login($parametros);
        return response()->json($login, 200, [], JSON_UNESCAPED_UNICODE);
    }

    public function index()
    {
        $user = $this->userService->allUser();
        return response()->json($user, 200, [], JSON_UNESCAPED_UNICODE);
    }

    public function find($id)
    {
        $user = $this->userService->userById($id);
        return response()->json($user, 200, [], JSON_UNESCAPED_UNICODE);
    }
}
