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
    public function getDegree(Request $request, $id)
    {
        if ($request->user()->role == 'teacher') {
            $degree = DB::table('degrees')->where('exam_id', $id)->get();
            //return $degree;
            for ($i = 0; $i < count($degree); $i++) {
                $all = [];
                $students[$i] = DB::table('students')->select('user_id')->where('id', $degree[$i]->id)->get();
                $users[$i] = DB::table('users')->select('firstname', 'lastname')->where('id', $students[$i][0]->user_id)->get();
                array_push($all, $users[$i][0]->firstname, $users[$i][0]->lastname, $degree[$i]->degree);
                $data[$i] = $all;
            }
            return $data;
        }
    }
}
