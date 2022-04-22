<?php

namespace App\Http\Controllers;

use App\Models\Complete;
use Illuminate\Http\Request;
use App\Imports\CompletesImport;
use App\Http\Misc\Helpers\Errors;
use App\Http\Misc\Helpers\Success;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\CompleteeRequest;
use App\Http\Resources\CompleteResource;

class CompleteController extends Controller
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
        if ($request->user()->role == 'teacher') {
            $complete = Complete::all();
            return $this->success_response($complete);
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
    public function store(CompleteeRequest $request)
    {
        if ($request->user()->role == 'teacher') {
            $complete = new Complete();
            $complete->question = $request->question;
            $complete->answer = $request->answer;
            $complete->degree = $request->degree;
            $complete->status = $request->status;
            $complete->time = $request->time;
            $complete->course_id = $request->course_id;
            $complete->save();
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
        if ($request->user()->role == 'teacher' || $request->user()->role == 'student') {
            $complete = Complete::find($id);
            if ($complete != null) {
                return $this->success_response($complete);
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
    public function update(Request $request, Complete $complete)
    {
        if ($request->user()->role == 'teacher') {
            $complete->question = $request->question;
            $complete->answer = $request->answer;
            $complete->degree = $request->degree;
            $complete->status = $request->status;
            $complete->time = $request->time;
            $complete->course_id = $request->course_id;
            $complete->save();
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
    public function delete(Request $request, Complete $complete)
    {
        if ($request->user()->role == 'teacher') {
            $del = Complete::find($complete->id);
            $del->delete();
            return $this->success_response(Success::DELETED);
        }
        return $this->error_response(Errors::ERROR);
    }


    public function import(Request $request)
    {
        if ($request->user()->role == 'teacher') {
            $file = $request->file('file')->getRealPath();
            Excel::import(new CompletesImport, $file);
            return $this->success_response("import done!");
        }
        return $this->error_response(Errors::ERROR);
    }

    public function course_question(Request $request, $id)
    {
        if ($request->user()->role == 'teacher') {
            $questions = DB::table('completes')->select('*')->where('course_id', $id)->get();
            return $this->success_response($questions);
        }
        return $this->error_response(Errors::ERROR);
    }
}
