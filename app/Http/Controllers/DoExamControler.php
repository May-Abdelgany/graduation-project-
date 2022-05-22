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
        session_start();
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
                $exam_date = $exam[0]->date;
                $date_now = $time1->format('Y-m-d');
                $result=[];
                if ($exam_date == $date_now && $time_now >= $start_time && $time_now < $end_time) {
                    $count = DB::table('exam_questions')->select("*")->where("exam_id", $exam[0]->id)->count();
                    while(count($result)<$count){
                        $Question= DB::table('exam_questions')->select("*")->where("exam_id", $exam[0]->id)->inRandomOrder()->limit(1)->get();
                        if(in_array($Question[0]->id,$result,true)==null){
                            array_push($result,$Question[0]->id);
                        }
                    }

                    for ($i = 0; $i < $count; $i++) {
                        $Question= DB::table('exam_questions')->select("*")->where("exam_id", $exam[0]->id)->where('id',$result[$i])->get();

                        if ($Question[0]->smcq_id != null) {
                            $object = new stdClass;
                            $object->smcq_id = $Question[0]->smcq_id;
                            $allQuestion[$i] = $object;
                        } else if ($Question[0]->complete_id != null) {
                            $object = new stdClass;
                            $object->complete_id = $Question[0]->complete_id;
                            $allQuestion[$i] = $object;
                        } else if ($Question[0]->t_f_id != null) {
                            $object = new stdClass;
                            $object->t_f_id = $Question[0]->t_f_id;
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
  /*  function get_question(Request $request)
    {
        $exam = DB::table('exams')->select('*')->where("code",$request->code)->get();
        if ($_SESSION['id'] == []) {
            $count = DB::table('exam_questions')->select("*")->where("exam_id", $exam[0]->id)->count();
            $questions = DB::table('exam_questions')->select("*")->where("exam_id", $exam[0]->id)->get();

            for ($i = 0; $i < $count; $i++) {
                array_push($_SESSION['id'], $questions[$i]->id);
            }
        }
        $rand = $_SESSION['id'][array_rand($_SESSION['id'])];
        $index = array_search($rand, $_SESSION['id'], true);
        unset($_SESSION['id'][$index]);
        $question = DB::table('exam_questions')->select("*")->where("exam_id", $exam[0]->id)->where('id', $rand)->get();

        if ($question[0]->smcq_id != null) {
            $mcq = DB::table('mcqs')->select('*')->where("id", $question[0]->smcq_id)->get();
            return [$mcq,'mcq'];
        } else if ($question[0]->complete_id != null) {
            $complete = DB::table('completes')->select('*')->where("id", $question[0]->complete_id)->get();
            return [$complete,'complete'];
        } else {
            $tf = DB::table('t__f_s')->select('*')->where("id", $question[0]->t_f_id)->get();
            return [$tf,'tf'];
        }
    }*/
    public function  end_exam(Request $request)
    {
        if ($request->user()->role == 'student') {
            $exam = DB::table('exams')->select('end_time')->where("code", $request[0])->get();
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
    public function do_exam(Request $request, $id)
    {
        if ($request->user()->role == 'teacher') {
            $student_id = DB::table('do_exams')->select('student_id')->where('exam_id', $id)->get();
            for ($i = 0; $i < count($student_id); $i++) {
                $user_id = DB::table('students')->select('user_id')->where('id', $student_id[$i]->student_id)->get();

                $data[$i] = DB::table('users')->select('id', 'firstname', 'lastname', 'email')->where('id', $user_id[0]->user_id)->get();
            }
            return  $this->success_response($data);
        }
    }
    public function student_id(Request $request, $id)
    {
        if ($request->user()->role == 'teacher') {
            $all = [];
            $student = DB::table('do_exams')->select('student_id')->where("exam_id", $id)->get();
            for ($i = 0; $i < count($student); $i++) {
                array_push($all, $student[$i]->student_id);
            }
            return $all;
        }
    }
    public function do_again(Request $request)
    {
        if ($request->user()->role == 'teacher') {
        }
        $student_id = DB::table('students')->where('user_id', $request->user_id)->select('id')->get();
        DB::table('do_exams')->where('exam_id', $request->exam_id)->where('student_id',  $student_id[0]->id)->delete();
        DB::table('degrees')->where('exam_id', $request->exam_id)->where('student_id',  $student_id[0]->id)->delete();
        DB::table('exams_answers')->where('exam_id', $request->exam_id)->where('student_id',  $student_id[0]->id)->delete();
        return $this->success_response(Success::DELETED);
    }
}
