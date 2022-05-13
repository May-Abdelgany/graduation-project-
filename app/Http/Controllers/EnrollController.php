<?php

namespace App\Http\Controllers;

use App\Models\Enroll;
use Illuminate\Http\Request;
use App\Http\Misc\Helpers\Errors;
use App\Http\Misc\Helpers\Success;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\Environment\Console;

class EnrollController extends Controller
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
            $enroll = new Enroll();
            if (Student::find($request->student_id) != null) {
                if (Course::find($request->course_id) != null) {
                    $enroll->course_id = $request->course_id;
                    $enroll->student_id = $request->student_id;
                    $enroll->save();
                    return $this->success_response(Success::ADDED);
                } else {
                    return $this->error_response("course does not exist!");
                }
            } else {
                return $this->error_response("student does not exist!");
            }
        } else $this->error_response(Errors::ERROR);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id) //id of course
    {
        if ($request->user()->role == 'admin') {
            $students_id = DB::table('enrolls')->select('student_id')->where('course_id', $id)->get()->all();
            for ($i = 0; $i < count($students_id); $i++) {
                $student_id = $students_id[$i]->student_id;
                // return array of arrays
                $students[$i] = DB::table('students')->select('user_id')->where('id', $student_id)->get()->all();
                $users_id[$i] = $students[$i][0]->user_id;
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
    public function update(Request $request, Enroll $enroll)
    {
        if ($request->user()->role == 'admin') {
            $enroll->course_id = $request->course_id;
            $enroll->student_id = $request->student_id;
            $enroll->save();
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
    }
    public function delete(Request $request, Enroll $enroll)
    {
        if ($request->user()->role == 'admin') {
            $del = Enroll::find($enroll->id);
            $del->delete();
            return $this->success_response(Success::DELETED);
        }
        return $this->error_response(Errors::ERROR);
    }
    public function enroll(Request $request)
    {
        $student_id = DB::table('students')->select('id')->where('user_id', $request->student_id)->get();

        $row = DB::table('enrolls')->select('*')->where('student_id', $student_id[0]->id)->where('course_id', $request->course_id)->get();
        return $row[0]->id;
    }

    public function myCourses(Request $request, $id)
    {
        if ($request->user()->role == 'student') {
            $row = DB::table('enrolls')->select('*')->where('student_id', $id)->get();
            for ($i = 0; $i < count($row); $i++) {
                $course_id[$i] = $row[$i]->course_id;
            }
            return  $course_id;
        }
    }

    public function enrolled(Request $request)
    {
        if ($request->user()->role == 'student') {
            $student_id = DB::table('students')->select('id')->where('user_id', $request->student_id)->get();
            $course_id = DB::table('exams')->select('course_id')->where('id', $request->exam_id)->get();
            $recordexist = DB::table('enrolls')->select('*')->where('student_id', $student_id[0]->id)->where('course_id', $course_id[0]->course_id)->get();
            if (sizeof($recordexist)!=0) {
                return $this->success_response('student enroll in course');
            }
            else{
                return $this->error_response('student not enroll in course');
            }
        }
    }
}
