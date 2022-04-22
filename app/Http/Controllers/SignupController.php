<?php

namespace App\Http\Controllers;

use App\Http\Misc\Helpers\Errors;
use App\Http\Misc\Helpers\Success;
use App\Http\Requests\SignupRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SignupController extends Controller
{
    public function addNew(SignupRequest $req){
        //creating user
        $user=User::create([
            'firstname'=>$req->firstname,
            'lastname'=>$req->lastname,
            'email'=>$req->email,
            'password'=>bcrypt($req->password),
            'changed_password'=>false
        ]);

        if(Auth::attempt($req->only('email','password'))){
            return $this->success_response(Success::SIGNUP);
        }
        return $this->success_response(Errors::SIGNUP);
    }
}
