<?php

namespace App\Http\Controllers;

use App\Models\Mcq;
use App\Imports\McqsImport;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Misc\Helpers\Errors;
use App\Http\Requests\McqRequest;
use App\Http\Misc\Helpers\Success;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\McqResource;
use App\Models\DynamicMcq;
use GrahamCampbell\ResultType\Result;
use Maatwebsite\Excel\Facades\Excel;

class McqController extends Controller
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
            $mcq = DB::table('mcqs')->select('*')->where('display', 'static')->inRandomOrder()->get();
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
    public function store(McqRequest $request)
    {
        if ($request->user()->role == 'teacher') {
            $Mcq = new Mcq();
            $Mcq->question = $request->question;
            $Mcq->answer1 = $request->answer1;
            $Mcq->answer2 = $request->answer2;
            $Mcq->answer3 = $request->answer3;
            $Mcq->correct_answer = $request->correct_answer;
            $Mcq->degree = $request->degree;
            $Mcq->status = $request->status;
            $Mcq->display = $request->display;
            $Mcq->time = $request->time;
            $Mcq->course_id = $request->course_id;
            $Mcq->save();
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
        $question = Mcq::find($id);
        if ($question != null) {
            if ($request->user()->role == 'student') {
                if ($question->display == 'dynamic') {
                    //question is array of object
                    $questions = DB::table('dynamic_mcqs')->select('*')->where('question_id', $id)->inRandomOrder()->limit(1)->get();
                    //question is string
                    $question = $questions[0]->question;
                    //make string in array of object
                    $arr = explode('`', $question);
                    $answer1 = $questions[0]->answer1;
                    $answer2 = $questions[0]->answer2;
                    $answer3 = $questions[0]->answer3;
                    $correct_answer = $questions[0]->correct_answer;
                    $arrcorrect = explode('`', $correct_answer);
                    //all is answer with out random
                    $all = [$answer1, $answer2, $answer3];
                    //make anser display random
                    for ($i = 0; $i < 20; $i++) {
                        //select random answer
                        $random[$i] = Arr::random($all);
                        //cheak element in array it must be unique
                        $rand = array_unique($random);
                    }
                    //merge between 2 array and result is array
                    $result = array_merge($arr, $rand, $arrcorrect);
                    $arr2 = array("question" => $result[0], "answer1" => $result[1], "answer2" => $result[2], "answer3" => $result[3], "correct_anwer" => $result[4]);

                    return $this->success_response($arr2);
                }
                //if display is static
                else {
                    $answers = DB::table('mcqs')->select('*')
                        ->where('id', $id)->get();
                    $question = $answers[0]->question;
                    $arr = explode('`', $question);
                    $answer1 = $answers[0]->answer1;
                    $answer2 = $answers[0]->answer2;
                    $answer3 = $answers[0]->answer3;
                    $correct_answer = $answers[0]->correct_answer;
                    $arrcorrect = explode('`', $correct_answer);
                    $all = [$answer1, $answer2, $answer3];
                    for ($i = 0; $i < 50; $i++) {
                        $random[$i] = Arr::random($all);
                        $rand = array_unique($random);
                    }
                    $result = array_merge($arr, $rand, $arrcorrect);
                    $arr2 = array("id"=>$id,"question" => $result[0], "answer1" => $result[1], "answer2" => $result[2], "answer3" => $result[3], "correct_anwer" => $result[4]);
                    return $this->success_response($arr2);
                }
            } else if ($request->user()->role == 'teacher') {
                return $this->success_response($question);
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
    public function update(Request $request, Mcq $Mcq)
    {
        if ($request->user()->role == 'teacher') {
            $Mcq->question = $request->question;
            $Mcq->answer1 = $request->answer1;
            $Mcq->answer2 = $request->answer2;
            $Mcq->answer3 = $request->answer3;
            $Mcq->correct_answer = $request->correct_answer;
            $Mcq->degree = $request->degree;
            $Mcq->status = $request->status;
            $Mcq->display = $request->display;
            $Mcq->time = $request->time;
            $Mcq->course_id = $request->course_id;
            $Mcq->save();
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
    public function delete(Request $request, $id)
    {
        if ($request->user()->role == 'teacher') {
            $del = Mcq::find($id);
            $del->delete();
            return $this->success_response(Success::DELETED);
        }
        return $this->error_response(Errors::ERROR);
    }
    public function import(Request $request)
    {
        if ($request->user()->role == 'teacher') {
            $file = $request->file('file');
            Excel::import(new McqsImport, $file);
            return $this->success_response("import done!");
        }
        return $this->error_response(Errors::ERROR);
    }

    public function course_question(Request $request, $id)
    {
        if ($request->user()->role == 'teacher') {
            $questions = DB::table('mcqs')->select('*')->where('course_id', $id)->get();
            return $this->success_response($questions);
        }
        return $this->error_response(Errors::ERROR);
    }
}
