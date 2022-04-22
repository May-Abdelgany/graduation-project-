<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Models\EnrollTeachers;
use App\Http\Misc\Helpers\Errors;
use App\Http\Misc\Helpers\Success;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\Environment\Console;

class EnrollTeachersController extends Controller
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
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        if ($request->user()->role == 'admin') {
            $enroll = new EnrollTeachers();
            if (Teacher::find($request->teacher_id) != null) {
                if (Course::find($request->course_id) != null) {
                    $enroll->course_id = $request->course_id;
                    $enroll->teacher_id = $request->teacher_id;
                    $enroll->save();
                    return $this->success_response(Success::ADDED);
                } else {
                    return $this->success_response("course does not exist!");
                }
            } else {
                return $this->success_response("student does not exist!");
            }
        } else $this->error_response(Errors::ERROR);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EnrollTeachers  $enrollTeachers
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        if ($request->user()->role == 'admin') {
            $teachers_id = DB::table('enroll_teachers')->select('teacher_id')->where('course_id', $id)->get()->all();
            for ($i = 0; $i < count($teachers_id); $i++) {
                $teacher_id = $teachers_id[$i]->teacher_id;
                // return array of arrays
                $teachers[$i] = DB::table('teachers')->select('user_id')->where('id', $teacher_id)->get()->all();
                $users_id[$i] = $teachers[$i][0]->user_id;
                $users[$i] = DB::table('users')->select("*")->where('id', $users_id[$i])->get();
            }

            return $this->success_response($users);
        } else {
            return $this->error_response(Errors::ERROR);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EnrollTeachers  $enrollTeachers
     * @return \Illuminate\Http\Response
     */
    public function edit(EnrollTeachers $enrollTeachers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EnrollTeachers  $enrollTeachers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EnrollTeachers $enroll)
    {
        if ($request->user()->role == 'admin') {
            $enroll->course_id = $request->course_id;
            $enroll->teacher_id = $request->teacher_id;
            $enroll->save();
            return $this->success_response(Success::UPDATED);
        } else {
            return $this->error_response(Errors::ERROR);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EnrollTeachers  $enrollTeachers
     * @return \Illuminate\Http\Response
     */
    public function destroy(EnrollTeachers $enrollTeachers)
    {
        //
    }
    public function delete(Request $request, EnrollTeachers $enroll)
    {
        if ($request->user()->role == 'admin') {

            $del = EnrollTeachers::find($enroll->id);
            $del->delete();
            return $this->success_response(Success::DELETED);
        }
        return $this->error_response(Errors::ERROR);
    }
    public function enroll(Request $request)
    {
        $teacher_id = DB::table('teachers')->select('id')->where('user_id', $request->teacher_id)->get();
        $row = DB::table('enroll_teachers')->select('*')->where('teacher_id', $teacher_id[0]->id)->where('course_id', $request->course_id)->get();
        return $row[0]->id;
    }

    public function myCourses(Request $request, $id)
    {
        if ($request->user()->role == 'teacher' || $request->user()->role == 'stuudent') {
            $row = DB::table('enroll_teachers')->select('*')->where('teacher_id', $id)->get();
            for ($i = 0; $i < count($row); $i++) {
                $course_id[$i] = $row[$i]->course_id;
            }
            return  $course_id;
        }
    }
}
