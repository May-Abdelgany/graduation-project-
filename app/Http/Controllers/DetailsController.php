<?php

namespace App\Http\Controllers;

use App\Http\Misc\Helpers\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetailsController extends Controller
{
    public  function __construct()
    {
        $this->middleware('auth:api');
    }
    public function Details(Request $request)
    {
        if ($request->user()->role == 'teacher') {
            $allAnswer = DB::table('exams_answers')->select('type', 'question_id', 'answer', 'grade')->where('exam_id', $request->exam_id)->where('student_id', $request->student_id)->get();
            $type = $data = $answer = $grade =$question=$correct_answer=$quetion_grade = $all = [];
            for ($i = 0; $i < count($allAnswer); $i++) {
                $type[$i] = $allAnswer[$i]->type;
                $answer[$i] = $allAnswer[$i]->answer;
                $grade[$i] = $allAnswer[$i]->grade;
                if ($type[$i] == 'tf') {
                    $data[$i] = DB::table('t__f_s')->select('question', 'correct_answer', 'degree')->where('id', $allAnswer[$i]->question_id)->get();
                    $question[$i]=$data[$i][0]->question;
                    $correct_answer[$i]=$data[$i][0]->correct_answer;
                    $quetion_grade[$i]=$data[$i][0]->degree;
                } else if ($type[$i] == 'mcq') {
                    $data[$i] = DB::table('mcqs')->select('question', 'correct_answer', 'degree')->where('id', $allAnswer[$i]->question_id)->get();
                    $question[$i]=$data[$i][0]->question;
                    $correct_answer[$i]=$data[$i][0]->correct_answer;
                    $quetion_grade[$i]=$data[$i][0]->degree;
                } else {
                    $data[$i] = DB::table('completes')->select('question', 'answer', 'degree')->where('id', $allAnswer[$i]->question_id)->get();
                    $question[$i]=$data[$i][0]->question;
                    $correct_answer[$i]=$data[$i][0]->answer;
                    $quetion_grade[$i]=$data[$i][0]->degree;
                }
            }
            array_push($all,$type,$question,$correct_answer,$quetion_grade,$answer,$grade);
            return $this->success_response($all);
        }
    }
}
