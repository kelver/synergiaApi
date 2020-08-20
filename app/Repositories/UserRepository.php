<?php
namespace App\Repositories;

use App\Model\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserRepository extends AbstractRepository
{
    protected $model = null;

    public function __construct()
    {
        $this->model = new User();
    }

    public function login($parametros)
    {
        $user = $this->model->where('email', $parametros['email'])->first();
        if (!$user || !Hash::check($parametros['password'], $user->password)) {
            throw ValidationException::withMessages([
                'message' => ['Não foi possível fazer login.'],
            ]);
        }

        $return = [
            'message' => 'Login efetuado com sucesso',
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email
            ],
            'token' => $user->createToken($parametros['email'])->plainTextToken
        ];

        return $return;
    }
}
