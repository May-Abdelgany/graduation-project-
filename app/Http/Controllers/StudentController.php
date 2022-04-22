<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Misc\Helpers\Errors;
use App\Http\Misc\Helpers\Success;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StudentRequest;
use App\Http\Resources\StudentResource;

class StudentController extends Controller
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
            $students = DB::table('users')->select("id","firstname", "lastname", "email")->where("role", "student")->get()->all();
            return $this->success_response($students);
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
    public function store(StudentRequest $request)
    {
        if ($request->user()->role == 'admin') {
            $student = new User();
            $student->firstname = $request->firstname;
            $student->lastname = $request->lastname;
            $student->email = $request->email;
            $student->password = bcrypt($request->password);
            $student->role = $request->role;
            $student->save();
            $add = new Student();
            $user = User::query()->orderByDesc('id')->first();
            $add->user_id = $user->id;

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
            $student= DB::table('users')->select("id", "firstname", "lastname", "email")->where("role", "student")->where("id", $id)->get();
            if ($student != null) {
                return $this->success_response($student);
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
    public function update(Request $request,  User $student)
    {
        if ($request->user()->role == 'admin') {
            $student->firstname = $request->firstname;
            $student->lastname = $request->lastname;
            $student->email = $request->email;
            $student->save();
            return $this->success_response(Success::UPDATED);
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
            $row = DB::table('students')->select("*")->where("user_id", $id)->delete();
            $del = User::find($id);
            $del->delete();
            return $this->success_response(Success::DELETED);
        }
        return $this->error_response(Errors::ERROR);
    }

    public function studentId($id){
        $row = DB::table('students')->select("*")->where("user_id",$id)->get();
        return $row[0]->id;
    }
}
