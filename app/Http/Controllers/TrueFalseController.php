<?php

namespace App\Http\Controllers;

use App\Models\T_F;
use App\Imports\TFsImport;
use Illuminate\Http\Request;
use App\Http\Requests\TfRequest;
use App\Http\Misc\Helpers\Errors;
use App\Http\Misc\Helpers\Success;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\HeadingRowImport;
use App\Http\Resources\TrueFalseResource;
use Illuminate\Support\Facades\DB;

class TrueFalseController extends Controller
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
            $tf = T_F::all();
            return $this->success_response($tf);
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
    public function store(TfRequest $request)
    {
        if ($request->user()->role == 'teacher') {
            $TF = new T_F();
            $TF->question = $request->question;
            $TF->answer1 = $request->answer1;
            $TF->answer2 = $request->answer2;
            $TF->correct_answer = $request->correct_answer;
            $TF->degree = $request->degree;
            $TF->status = $request->status;
            $TF->course_id = $request->course_id;
            $TF->save();
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
        if ($request->user()->role == 'teacher'||$request->user()->role == 'student') {
            $tf = T_F::find($id);
            if ($tf != null) {
                return $this->success_response($tf);
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
    public function update(Request $request, T_F $tf)
    {
        if ($request->user()->role == 'teacher') {
            $tf->question = $request->question;
            $tf->answer1 = $request->answer1;
            $tf->answer2 = $request->answer2;
            $tf->correct_answer = $request->correct_answer;
            $tf->degree = $request->degree;
            $tf->status = $request->status;
            $tf->course_id = $request->course_id;
            $tf->save();
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
    public function delete(Request $request, T_F $tf)
    {
        if ($request->user()->role == 'teacher') {
            $del = T_F::find($tf->id);
            $del->delete();
            return $this->success_response(Success::DELETED);
        }
        return $this->error_response(Errors::ERROR);
    }

    public function import(Request $request,$course)
    {

        if ($request->user()->role == 'teacher') {
            $file = $request->file('file');
            Excel::import(new TFsImport($course), $file);
            return $this->success_response("import done!");
        }
        return $this->error_response(Errors::ERROR);
    }
    public function course_question(Request $request, $id)
    {
        if ($request->user()->role == 'teacher') {
            $questions = DB::table('t__f_s')->select('*')->where('course_id', $id)->get();
            return $this->success_response($questions);
        }
        return $this->error_response(Errors::ERROR);
    }
}
