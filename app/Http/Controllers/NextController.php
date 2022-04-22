<?php

namespace App\Http\Controllers;

use App\Http\Misc\Helpers\Success;
use App\Models\ExamsAnswers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NextController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
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

    public function setAnswer(Request $request)
    {
        if ($request->user()->role == 'student') {

            $id = DB::table('students')->select("id")->where('user_id', $request->student_id)->get();
            $answer = new ExamsAnswers();
            $answer->exam_id = $request->exam_id;
            $answer->student_id = $id[0]->id;
            $answer->type = $request->type;
            $answer->question_id = $request->question_id;
            $answer->answer = $request->answer;
            $answer->grade = $request->grade;
            $answer->save();
            return $this->success_response(Success::ADDED);
        }
    }

    public function finish(Request $request)
    {
        $myGrade = 0;
        $totalGrade=0;
        if ($request->user()->role == 'student') {
            $id = DB::table('students')->select("id")->where('user_id', $request->student_id)->get();
            $allAnswers = DB::table('exams_answers')->select("*")->where('student_id', $id[0]->id)->where('exam_id', $request->exam_id)->get();
            for ($i = 0; $i < sizeof($allAnswers); $i++) {
                $answer = $allAnswers[$i]->answer;
                if ($allAnswers[$i]->type == 'complete') {
                    $complete = DB::table('completes')->select("answer", "degree")->where('id', $allAnswers[$i]->question_id)->get();
                    $totalGrade += $complete[0]->degree;
                    if (strcmp($complete[0]->answer, $answer) != 0) {
                        $myGrade += $complete[0]->degree;
                        $update = ExamsAnswers::find($allAnswers[$i]->id);
                        $update->grade = $complete[0]->degree;
                        $update->save();
                    }
                } else if (strcmp($allAnswers[$i]->type, 'mcq') != 0) {
                    $mcq = DB::table('mcqs')->select("correct_answer", "degree")->where('id', $allAnswers[$i]->question_id)->get();
                    $totalGrade += $mcq[0]->degree;
                    if ($mcq[0]->correct_answer == $answer) {
                        $myGrade += $mcq[0]->degree;
                        $update = ExamsAnswers::find($allAnswers[$i]->id);
                        $update->grade = $mcq[0]->degree;
                        $update->save();
                    }
                } else {
                    $tf = DB::table('t__f_s')->select("correct_answer", "degree")->where('id', $allAnswers[$i]->question_id)->get();
                    $totalGrade += $tf[0]->degree;
                    if ($tf[0]->correct_answer == $answer) {
                        $myGrade += $tf[0]->degree;
                        $update = ExamsAnswers::find($allAnswers[$i]->id);
                        $update->grade = $tf[0]->degree;
                        $update->save();
                    }
                }
            }
            $result= ["myGrade"=>$myGrade,"totalGrade"=>$totalGrade];
            return $this->success_response($result);
        }
    }
}
