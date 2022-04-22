<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Imports\CourseImport;
use App\Http\Misc\Helpers\Errors;
use App\Http\Misc\Helpers\Success;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CourseRequest;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Resources\CourseResource;

class CourseController extends Controller
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
        $courses = DB::table('courses')->select("*")->get()->all();
        return $this->success_response($courses);
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
    public function store(CourseRequest $request)
    {
        if ($request->user()->role == 'admin') {
            $course = new Course();
            $course->title = $request->title;
            $course->description = $request->description;
            $course->save();
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

            $course = Course::find($id);
            if ($course != null) {
                return $this->success_response($course);
            } else {
                return $this->error_response(Errors::NOT_EXISTS);
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
    public function update(Request $request, Course $course)
    {
        if ($request->user()->role == 'admin') {
            $course->title = $request->title;
            $course->description = $request->description;
            $course->save();
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
    public function delete(Request $request, Course $course)
    {
        if ($request->user()->role == 'admin') {
            $del = Course::find($course->id);
            $del->delete();
            return $this->success_response(Success::DELETED);
        }
        return $this->error_response(Errors::ERROR);
    }
}
