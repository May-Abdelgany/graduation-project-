<?php

namespace App\Http\Controllers;

use App\Models\DynamicMcq;
use Illuminate\Http\Request;
use App\Http\Misc\Helpers\Errors;
use App\Http\Misc\Helpers\Success;
use App\Imports\DynamicMcqsImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\DynamicMcqRequest;

class DynamicMcqController extends Controller
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
            $mcq = DynamicMcq::all();
            return $this->success_response($mcq);
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
    public function store(DynamicMcqRequest $request)
    {
        if ($request->user()->role == 'teacher') {
            $Mcq = new DynamicMcq();
            $Mcq->question_id = $request->question_id;
            $Mcq->question = $request->question;
            $Mcq->answer1 = $request->answer1;
            $Mcq->answer2 = $request->answer2;
            $Mcq->answer3 = $request->answer3;
            $Mcq->correct_answer = $request->correct_answer;
            $Mcq->save();
            return $this->success_response(Success::ADDED);
        } else {
            return $this->error_response(Errors::ERROR);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DynamicMcq  $dynamicMcq
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        if ($request->user()->role == 'teacher') {
            $Mcq = DynamicMcq::find($id);
            if ($Mcq != null) {
                return $this->success_response($Mcq);
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
     * @param  \App\Models\DynamicMcq  $dynamicMcq
     * @return \Illuminate\Http\Response
     */
    public function edit(DynamicMcq $dynamicMcq)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DynamicMcq  $dynamicMcq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DynamicMcq $Mcq)
    {
        if ($request->user()->role == 'teacher') {
            $Mcq->question_id = $request->question_id;
            $Mcq->question = $request->question;
            $Mcq->answer1 = $request->answer1;
            $Mcq->answer2 = $request->answer2;
            $Mcq->answer3 = $request->answer3;
            $Mcq->correct_answer = $request->correct_answer;
            $Mcq->save();
            return $this->success_response(Success::UPDATED);
        } else {
            return $this->error_response(Errors::ERROR);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DynamicMcq  $dynamicMcq
     * @return \Illuminate\Http\Response
     */
    public function destroy(DynamicMcq $dynamicMcq)
    {
        //
    }
    public function delete(Request $request, DynamicMcq $Mcq)
    {
        if ($request->user()->role == 'teacher') {
            $del = DynamicMcq::find($Mcq->id);
            $del->delete();
            return $this->success_response(Success::DELETED);
        }
        return $this->error_response(Errors::ERROR);
    }
    
    public function import(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new DynamicMcqsImport, $file);
        return $this->success_response("import done!");
    }
}
