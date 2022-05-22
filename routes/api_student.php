<?php

use App\Http\Controllers\DegreeController;
use App\Http\Controllers\DoExamControler;
use App\Http\Controllers\EnrollController;
use App\Http\Controllers\NextController;
use App\Http\Controllers\spellCheckController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'AuthAccess'], function () {
    Route::POST('/exam_id', [DoExamControler::class, 'exam_id']);
    Route::POST('/startExam', [DoExamControler::class, 'startExam']);
    Route::POST('/endexam', [DoExamControler::class, 'end_exam']);
    Route::POST('/startexam', [DoExamControler::class, 'start_exam']);
    Route::POST('/getquestion', [DoExamControler::class, 'get_question']);
    Route::POST('/access', [DoExamControler::class, 'access']);
    Route::POST('/setAnswer', [NextController::class, 'setAnswer']);
    Route::POST('/finish', [NextController::class, 'finish']);
    Route::POST('/degrees', [DegreeController::class, 'store']);
    Route::get('/student/myCourses/{id}', [EnrollController::class, 'myCourses']);
    Route::POST('/enrolled', [EnrollController::class, 'enrolled']);
});
