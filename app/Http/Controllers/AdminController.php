<?php

namespace App\Http\Controllers;

use App\Http\Misc\Helpers\Errors;
use App\Http\Misc\Helpers\Success;
use App\Http\Requests\AdmintRequest;
use App\Http\Resources\AdminResource;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Exists;
use PhpParser\Node\Stmt\Return_;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public  function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index(Request $request)
    {
        if ($request->user()->role == 'admin') {
            $admins = DB::table('users')->select("id", "firstname", "lastname", "email")->where("role", "admin")->get()->all();
            return $this->success_response($admins);
        } else {
            return $this->error_response(Errors::ERROR);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdmintRequest $request)
    {
        if ($request->user()->role == 'admin'  && $request->user()->id == 1) {
            $admin = new User();
            $admin->firstname = $request->firstname;
            $admin->lastname = $request->lastname;
            $admin->email = $request->email;
            $admin->password = bcrypt($request->password);
            $admin->role = $request->role;
            $admin->save();
            $user = User::query()->orderByDesc('id')->first();
            $add = new Admin();
            $add->user_id = $user->id;;
            $add->save();
            return $this->success_response(Success::ADDED);
        } else {
            return $this->error_response(Errors::ERROR);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        if ($request->user()->role == 'admin'  && $request->user()->id == 1) {
            $admin = DB::table('users')->select("id", "firstname", "lastname", "email")->where("role", "admin")->where("id", $id)->get();
            if ($admin != null) {
                return $this->success_response($admin);
            } else {
                return $this->error_response(Errors::NOT_EXISTS);
            }
        } else {
            return $this->error_response(Errors::ERROR);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $admin)
    {
        if ($request->user()->role == 'admin' && $request->user()->id == 1) {
            if ($admin->role == 'admin') {
                $admin->firstname = $request->firstname;
                $admin->lastname = $request->lastname;
                $admin->email = $request->email;
                $admin->save();
                return $this->success_response(Success::UPDATED);
            } else {
                return $this->success_response("user that will be update not admin");
            }
        } else {
            return $this->error_response(Errors::ERROR);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, $id)
    {
        if ($request->user()->role == 'admin'  && $request->user()->id == 1) {
            $row = DB::table('teachers')->select("*")->where("user_id", $id)->delete();
            $del = User::find($id);
            $del->delete();
            return $this->success_response(Success::DELETED);
        }
        return $this->error_response(Errors::ERROR);
    }
}
