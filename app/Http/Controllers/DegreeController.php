<?php

namespace App\Http\Controllers;

use App\Exports\DegreesExport;
use App\Http\Misc\Helpers\Errors;
use App\Http\Misc\Helpers\Success;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Resources\DegreeResource;
use App\Models\Degree;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DegreeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public  function __construct()
    {
        $this->middleware('auth:api')->except('export');
    }
    public function index()
    {
        $degrees = Degree::all();
        return DegreeResource::collection($degrees);
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
         if ($request->user()->role == 'student') {
            $id = DB::table('students')->select("id")->where('user_id', $request->student_id)->get();
            $degree = new Degree();
            $degree->exam_id = $request->exam_id;
            $degree->student_id = $id[0]->id;
            $degree->degree = $request->degree;
            $degree->save();
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

    public function export($id)
    {
        return Excel::download(new DegreesExport($id), 'degree.xlsx');
    }
    public function getDegree(Request $request)
    {
        if ($request->user()->role == 'teacher') {
            $all = [];
            $total = 0;
            $degree = [];
            $question = DB::table('exam_questions')->select('smcq_id', 't_f_id', 'complete_id')->where('exam_id', $request->exam_id)->get();
            for ($i = 0; $i < count($question); $i++) {
                if ($question[$i]->smcq_id != null) {
                    $degree = DB::table('mcqs')->select('degree')->where('id', $question[$i]->smcq_id)->get();
                    $total += $degree[0]->degree;
                } else  if ($question[$i]->t_f_id != null) {
                    $degree = DB::table('t__f_s')->select('degree')->where('id', $question[$i]->t_f_id)->get();
                    $total += $degree[0]->degree;
                } else {
                    $degree = DB::table('completes')->select('degree')->where('id', $question[$i]->complete_id)->get();
                    $total += $degree[0]->degree;
                }
            }

            $degree = DB::table('degrees')->where('exam_id', $request->exam_id)->where('student_id', $request->student_id)->get();
            $students = DB::table('students')->select('id', 'user_id')->where('id', $request->student_id)->get();
            $users = DB::table('users')->select('firstname', 'lastname')->where('id', $students[0]->user_id)->get();
            array_push($all, $students[0]->id, $users[0]->firstname, $users[0]->lastname, $degree[0]->degree, $total);
            return $all;
        }
    }
}
