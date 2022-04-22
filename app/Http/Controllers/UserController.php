<?php

namespace App\Http\Controllers;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserCollection;
use App\Http\Misc\Helpers\Success;
use App\Models\Admin;

class UserController extends Controller
{
    public function index () {
        $users=User::all();
        return  UserResource::collection($users);
    }
}
