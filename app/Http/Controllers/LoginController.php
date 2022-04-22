<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Misc\Helpers\Errors;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //with passport auth
    public function login(LoginRequest $request)


    {

        if(Auth::attempt($request->only('email','password'))){
            $user = User::where(['email' => strtolower($request->email)])->first();
            return new UserResource($user);
        }
        return $this->error_response(Errors::UNAUTHORIZED);

    }
}
