<?php

namespace App\Http\Controllers;

use config;
use stdClass;
use App\Models\Exam;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Misc\Helpers\Errors;
use App\Http\Misc\Helpers\Success;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\DoExam;
use Carbon\Carbon;
use Illuminate\Support\Carbon as SupportCarbon;
use Illuminate\Support\Facades\Redirect;

class DoExamControler extends Controller
{
    public  function __construct()
    {
        $this->middleware('auth:api');
    }
    public function exam_id(Request $request)
    {
        if ($request->user()->role == 'student') {
            $exam = DB::table('exams')->select('*')->where("code", $request->code)->get();
            return $exam[0]->id;
        }
    }
    function startExam(Request $request)
    {
        $c = 0;
        if ($request->user()->role == 'student') {
            $exam = DB::table('exams')->select('*')->where("code", $request->code)->get();
            if ($exam->isEmpty()) {
                return $this->error_response(Errors::ExamNotExist);
            } else {
                $time1 = SupportCarbon::now('Africa/Cairo');
                $time_now = strtotime($time1->format('H:i:s'));
                $start_time = strtotime($exam[0]->time_of_exam);
                $end_time = strtotime($exam[0]->end_time);
                if ($time_now >= $start_time && $time_now < $end_time) {
                    $count = DB::table('exam_questions')->select("*")->where("exam_id", $exam[0]->id)->count();
                    for ($i = 0; $i < pow($count, 3); $i++) {
                        $Question[$i] = DB::table('exam_questions')->select("*")->where("exam_id", $exam[0]->id)->inRandomOrder()->limit(1)->get();
                        $result = array_unique($Question);
                        if (array_key_exists($i, $result)) {
                            $results[$c] = $result[$i];
                            $c++;
                        }
                    }
                    for ($i = 0; $i < $count; $i++) {
                        $Question_id[$i] = $results[$i][0];
                        if ($Question_id[$i]->smcq_id != null) {
                            $object = new stdClass;
                            $object->smcq_id = $Question_id[$i]->smcq_id;
                            $allQuestion[$i] = $object;
                        } else if ($Question_id[$i]->dmcq_id != null) {
                            $object = new stdClass;
                            $object->dmcq_id = $Question_id[$i]->dmcq_id;
                            $allQuestion[$i] = $object;
                        } else if ($Question_id[$i]->complete_id != null) {
                            $object = new stdClass;
                            $object->complete_id = $Question_id[$i]->complete_id;
                            $allQuestion[$i] = $object;
                        } else if ($Question_id[$i]->t_f_id != null) {
                            $object = new stdClass;
                            $object->t_f_id = $Question_id[$i]->t_f_id;
                            $allQuestion[$i] = $object;
                        }
                    }
                    return $allQuestion;
                } else {
                    return $this->error_response("can't access now to exam");
                }
            }
        } else {
            return $this->error_response(Errors::ERROR);
        }
    }
    public function  end_exam(Request $request)
    {
        if ($request->user()->role == 'student') {
            $time1 = SupportCarbon::now('Africa/Cairo');
            $time_now = strtotime($time1->format('H:i:s'));
            $exam = DB::table('exams')->select('end_time')->where("code", $request->code)->get();
            return $this->success_response($exam[0]->end_time);
        }
    }
    public function  start_exam(Request $request)
    {
        if ($request->user()->role == 'student') {
            $time1 = SupportCarbon::now('Africa/Cairo');
            $time_now = $time1->format('H:i:s');
            return $this->success_response($time_now);
        }
    }
    public function access(Request $request)
    {
        if ($request->user()->role == 'student') {
            $id = DB::table('students')->select('id')->where('user_id', $request->student_id)->get();
            $data = DB::table('do_exams')->select("*")->where('exam_id', $request->exam_id)->where('student_id', $id[0]->id)->get();
            if ($data->isEmpty()) {
                $add = new DoExam();
                $add->exam_id = $request->exam_id;
                $add->student_id = $id[0]->id;
                $add->save();
                return $this->success_response(Success::ACCESS);
            } else {
                return $this->error_response(Errors::NOTACCESS);
            }
        }
    }
}
