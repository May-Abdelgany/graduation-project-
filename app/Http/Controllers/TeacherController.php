<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Misc\Helpers\Errors;
use App\Http\Misc\Helpers\Success;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\TeacherRequest;
use App\Http\Resources\TeacherResource;

class TeacherController extends Controller
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
            $teachers = DB::table('users')->select("id", "firstname", "lastname", "email")->where("role", "teacher")->get()->all();
            return $this->success_response($teachers);
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeacherRequest $request)
    {
        if ($request->user()->role == 'admin') {
            $teacher = new User();
            $teacher->firstname = $request->firstname;
            $teacher->lastname = $request->lastname;
            $teacher->email = $request->email;
            $teacher->password = bcrypt($request->password);
            $teacher->role = $request->role;
            $teacher->save();
            $user = User::query()->orderByDesc('id')->first();
            $add = new Teacher();
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
        if ($request->user()->role == 'admin') {
            $teacher= DB::table('users')->select("id", "firstname", "lastname", "email")->where("role", "teacher")->where("id", $id)->get();
            if ($teacher != null) {
                return $this->success_response($teacher);
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
    public function update(Request $request,  User $teacher)
    {
        if ($request->user()->role == 'admin') {
            if ($teacher->role == 'teacher') {
                $teacher->firstname = $request->firstname;
                $teacher->lastname = $request->lastname;
                $teacher->email = $request->email;
                $teacher->save();
                return $this->success_response(Success::UPDATED);
            } else {
                return $this->success_response("user that will be update not teacher");
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
    public function destroy($id)
    {
        //
    }
    public function delete(Request $request, $id)
    {
        if ($request->user()->role == 'admin') {
            $row = DB::table('teachers')->select("*")->where("user_id", $id)->delete();
            $del = User::find($id);
            $del->delete();
            return $this->success_response(Success::DELETED);
        }
        return $this->error_response("Don't Have Permission For That");
    }

    public function teacherId($id){
        $row = DB::table('teachers')->select("*")->where("user_id",$id)->get();
        return $row[0]->id;
    }
}
