<?php

namespace App\Http\Controllers\v1;


use App\Http\Controllers\Controller;
use App\Http\Helpers\ResponseTrait;
use App\Http\Requests\LoginRequest;
use App\Models\User;

class LoginController extends Controller
{
    use ResponseTrait;

    public function login(LoginRequest $request)
    {
        $user = User::user($request->email)->first();

        return $this->validResponseWithData([
            'user' => $user,
            'token' => $user->createToken('User-Token')->plainTextToken
        ]);
    }

}
