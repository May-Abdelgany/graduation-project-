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
            $exam->number_of_question_tf = $request->number_of_question_tf;
            $exam->number_of_question_complete = $request->number_of_question_complete;
            $exam->number_of_question_static_mcq = $request->number_of_question_static_mcq;
            $exam->number_of_question_dynamic_mcq = $request->number_of_question_dynamic_mcq;
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
            $exam->number_of_question_tf = $request->number_of_question_tf;
            $exam->number_of_question_complete = $request->number_of_question_complete;
            $exam->number_of_question_static_mcq = $request->number_of_question_static_mcq;
            $exam->number_of_question_complete = $request->number_of_question_complete;
            $exam->end_time = $request->end_time;
            $exam->time_of_exam= $request->time_of_exam;
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
            $countQuestion = DB::table('exams')->select("number_of_question_tf", "number_of_question_complete", "number_of_question_static_mcq", "number_of_question_dynamic_mcq")->where('id', $id)->get();
            $countTf =  $countQuestion[0]->number_of_question_tf;
            $countComplete =  $countQuestion[0]->number_of_question_complete;
            $countSMcq =  $countQuestion[0]->number_of_question_static_mcq;
            $countDMcq =  $countQuestion[0]->number_of_question_dynamic_mcq;
            $questionTf = DB::table('t__f_s')->select("id")->get()->random($countTf);
            for ($i = 0; $i < $countTf; $i++) {
                $exam_tf = new ExamQuestion();
                $exam_tf->t_f_id = $questionTf[$i]->id;
                $exam_tf->exam_id = $id;
                $exam_tf->save();
            }
            $questionComplete = DB::table('completes')->select("id")->get()->random($countComplete);
            for ($i = 0; $i < $countComplete; $i++) {
                $exam_complete = new ExamQuestion();
                $exam_complete->complete_id = $questionComplete[$i]->id;
                $exam_complete->exam_id = $id;
                $exam_complete->save();
            }
            $questionSMcq = DB::table('mcqs')->select("id")->where('display', 'static')->get()->random($countSMcq);
            for ($i = 0; $i < $countSMcq; $i++) {
                $exam_smcq = new ExamQuestion();
                $exam_smcq->smcq_id = $questionSMcq[$i]->id;
                $exam_smcq->exam_id = $id;
                $exam_smcq->save();
            }
            $questionDMcq = DB::table('mcqs')->select("id")->where('display', 'dynamic')->get()->random($countDMcq);
            for ($i = 0; $i < $countDMcq; $i++) {
                $exam_dmcq = new ExamQuestion();
                $exam_dmcq->dmcq_id =  $questionDMcq[$i]->id;
                $exam_dmcq->exam_id = $id;
                $exam_dmcq->save();
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
