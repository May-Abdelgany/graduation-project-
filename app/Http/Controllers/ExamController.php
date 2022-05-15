<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use Illuminate\Http\Request;
use App\Http\Misc\Helpers\Errors;
use App\Http\Misc\Helpers\Success;
use App\Http\Requests\ExamRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\ExamResource;
use App\Models\ExamQuestion;

class ExamController extends Controller
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
            $exams = DB::table('exams')->select("*")->get()->all();
            return $this->success_response($exams);
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
    public function store(ExamRequest $request)
    {
        if ($request->user()->role == 'teacher') {
            $exam = new Exam();
            $exam->name = $request->name;
            $exam->code = $request->code;
            $exam->number_of_question_tf_easy = $request->number_of_question_tf_easy;
            $exam->number_of_question_tf_medium = $request->number_of_question_tf_medium;
            $exam->number_of_question_tf_difficult = $request->number_of_question_tf_difficult;
            $exam->number_of_question_complete_easy = $request->number_of_question_complete_easy;
            $exam->number_of_question_complete_medium = $request->number_of_question_complete_medium;
            $exam->number_of_question_complete_difficult = $request->number_of_question_complete_difficult;
            $exam->number_of_question_static_mcq_easy = $request->number_of_question_static_mcq_easy;
            $exam->number_of_question_static_mcq_medium = $request->number_of_question_static_mcq_medium;
            $exam->number_of_question_static_mcq_difficult = $request->number_of_question_static_mcq_difficult;
            $exam->date = $request->date;
            $exam->end_time = $request->end_time;
            $exam->time_of_exam = $request->time_of_exam;
            $exam->course_id = $request->course_id;
            $exam->save();
            return $exam;
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
        if ($request->user()->role == 'teacher') {
            $exam = Exam::find($id);
            return $this->success_response($exam);
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
    public function update(Request $request, Exam $exam)
    {
        if ($request->user()->role == 'teacher') {
            $exam->name = $request->name;
            $exam->code = $request->code;
            $exam->number_of_question_tf_easy = $request->number_of_question_tf_easy;
            $exam->number_of_question_tf_medium = $request->number_of_question_tf_medium;
            $exam->number_of_question_tf_difficult = $request->number_of_question_tf_difficult;
            $exam->number_of_question_complete_easy = $request->number_of_question_complete_easy;
            $exam->number_of_question_complete_medium = $request->number_of_question_complete_medium;
            $exam->number_of_question_complete_difficult = $request->number_of_question_complete_difficult;
            $exam->number_of_question_static_mcq_easy = $request->number_of_question_static_mcq_easy;
            $exam->number_of_question_static_mcq_medium = $request->number_of_question_static_mcq_medium;
            $exam->number_of_question_static_mcq_difficult = $request->number_of_question_static_mcq_difficult;
            $exam->date = $request->date;
            $exam->end_time = $request->end_time;
            $exam->time_of_exam = $request->time_of_exam;
            $exam->course_id = $request->course_id;
            $exam->save();
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
    public function delete(Request $request, Exam $exam)
    {
        if ($request->user()->role == 'teacher') {

            $del = exam::find($exam->id);
            $del->delete();
            return $this->success_response(Success::DELETED);
        }
        return $this->error_response("Don't Have Permission For That");
    }
    public function setQuestion(Request $request, $id)
    {
        if ($request->user()->role == 'teacher') {
            $countQuestion = DB::table('exams')->select("*")->where('id', $id)->get();
            $countTf_easy =  $countQuestion[0]->number_of_question_tf_easy;
            $countTf_medium =  $countQuestion[0]->number_of_question_tf_medium;
            $countTf_difficult =  $countQuestion[0]->number_of_question_tf_difficult;
            $countComplete_easy =  $countQuestion[0]->number_of_question_complete_easy;
            $countComplete_medium =  $countQuestion[0]->number_of_question_complete_medium;
            $countComplete_difficult =  $countQuestion[0]->number_of_question_complete_difficult;
            $countSMcq_easy =  $countQuestion[0]->number_of_question_static_mcq_easy;
            $countSMcq_medium =  $countQuestion[0]->number_of_question_static_mcq_medium;
            $countSMcq_difficult =  $countQuestion[0]->number_of_question_static_mcq_difficult;
            $questionTf = DB::table('t__f_s')->select("id")->where('status','easy')->get()->random( $countTf_easy);
            for ($i = 0; $i < $countTf_easy; $i++) {
                $exam_tf = new ExamQuestion();
                $exam_tf->t_f_id = $questionTf[$i]->id;
                $exam_tf->exam_id = $id;
                $exam_tf->save();
            }
            $questionTf = DB::table('t__f_s')->select("id")->where('status','medium')->get()->random( $countTf_medium);
            for ($i = 0; $i < $countTf_medium; $i++) {
                $exam_tf = new ExamQuestion();
                $exam_tf->t_f_id = $questionTf[$i]->id;
                $exam_tf->exam_id = $id;
                $exam_tf->save();
            }
            $questionTf = DB::table('t__f_s')->select("id")->where('status','difficult')->get()->random( $countTf_difficult);
            for ($i = 0; $i < $countTf_difficult; $i++) {
                $exam_tf = new ExamQuestion();
                $exam_tf->t_f_id = $questionTf[$i]->id;
                $exam_tf->exam_id = $id;
                $exam_tf->save();
            }
            $questionComplete = DB::table('completes')->select("id")->where('status','easy')->get()->random($countComplete_easy);
            for ($i = 0; $i < $countComplete_easy; $i++) {
                $exam_complete = new ExamQuestion();
                $exam_complete->complete_id = $questionComplete[$i]->id;
                $exam_complete->exam_id = $id;
                $exam_complete->save();
            }
            $questionComplete = DB::table('completes')->select("id")->where('status','medium')->get()->random($countComplete_medium);
            for ($i = 0; $i < $countComplete_medium; $i++) {
                $exam_complete = new ExamQuestion();
                $exam_complete->complete_id = $questionComplete[$i]->id;
                $exam_complete->exam_id = $id;
                $exam_complete->save();
            }
            $questionComplete = DB::table('completes')->select("id")->where('status','difficult')->get()->random($countComplete_difficult);
            for ($i = 0; $i < $countComplete_difficult; $i++) {
                $exam_complete = new ExamQuestion();
                $exam_complete->complete_id = $questionComplete[$i]->id;
                $exam_complete->exam_id = $id;
                $exam_complete->save();
            }
            $questionSMcq = DB::table('mcqs')->select("id")->where('status','easy')->where('display', 'static')->get()->random($countSMcq_easy);
            for ($i = 0; $i < $countSMcq_easy; $i++) {
                $exam_smcq = new ExamQuestion();
                $exam_smcq->smcq_id = $questionSMcq[$i]->id;
                $exam_smcq->exam_id = $id;
                $exam_smcq->save();
            }
            $questionSMcq = DB::table('mcqs')->select("id")->where('status','medium')->where('display', 'static')->get()->random($countSMcq_medium);
            for ($i = 0; $i < $countSMcq_medium; $i++) {
                $exam_smcq = new ExamQuestion();
                $exam_smcq->smcq_id = $questionSMcq[$i]->id;
                $exam_smcq->exam_id = $id;
                $exam_smcq->save();
            }
            $questionSMcq = DB::table('mcqs')->select("id")->where('status','difficult')->where('display', 'static')->get()->random($countSMcq_difficult);
            for ($i = 0; $i < $countSMcq_difficult; $i++) {
                $exam_smcq = new ExamQuestion();
                $exam_smcq->smcq_id = $questionSMcq[$i]->id;
                $exam_smcq->exam_id = $id;
                $exam_smcq->save();
            }
            return $this->success_response(Success::CREATE);
        } else {
            return $this->error_response(Errors::ERROR);
        }
    }
    public function course_question(Request $request, $id)
    {
        if ($request->user()->role == 'teacher') {
            $questions = DB::table('exams')->select('*')->where('course_id', $id)->get();
            return $this->success_response($questions);
        }
        return $this->error_response(Errors::ERROR);
    }
    public function get_complete(Request $request, $id)
    {
        if ($request->user()->role == 'teacher') {
            $c = 0;
            $complete = DB::table('exam_questions')->select("complete_id")->where("exam_id", $id)->get();
            for ($i = 0; $i < count($complete); $i++) {
                if ($complete[$i]->complete_id != null) {
                    $allQuestions[$c] = $complete[$i];
                    $c++;
                }
            }
            return $allQuestions;
        }
    }
    public function get_mcq(Request $request, $id)
    {
        if ($request->user()->role == 'teacher') {
            $c = 0;
            $mcq = DB::table('exam_questions')->select("smcq_id")->where("exam_id", $id)->get();
            for ($i = 0; $i < count($mcq); $i++) {
                if ($mcq[$i]->smcq_id != null) {
                    $allQuestions[$c] = $mcq[$i];
                    $c++;
                }
            }
            return $allQuestions;
        }
    }
    public function get_tf(Request $request, $id)
    {
        if ($request->user()->role == 'teacher') {
            $c = 0;
            $tf = DB::table('exam_questions')->select("t_f_id")->where("exam_id", $id)->get();
            for ($i = 0; $i < count($tf); $i++) {
                if ($tf[$i]->t_f_id != null) {
                    $allQuestions[$c] = $tf[$i];
                    $c++;
                }
            }
            return $allQuestions;
        }
    }
}
