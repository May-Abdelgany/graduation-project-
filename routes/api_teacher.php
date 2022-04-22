<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompleteController;
use App\Http\Controllers\DynamicMcqController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\McqController;
use App\Http\Controllers\TFExamController;
use App\Http\Controllers\DegreeController;
use App\Http\Controllers\EnrollTeachersController;
use App\Http\Controllers\TrueFalseController;

Route::group(['middleware' => 'AuthAccess'], function () {
    Route::get('/teacher/myCourses/{id}', [EnrollTeachersController::class, 'myCourses']);

    //curd system of complete question
    //show all complete questions
    Route::get('/questions/complete', [CompleteController::class, 'index']);
    //add complete question
    Route::post('/questions/complete', [CompleteController::class, 'store']);
    //show one complete question
    Route::get('/question/complete/{id}', [CompleteController::class, 'show']);
    //update complete question
    Route::put('/question/complete/{complete}', [CompleteController::class, 'update']);
    //delete complete question
    Route::delete('/question/complete/{complete}', [CompleteController::class, 'delete']);
    Route::get('/coursequestion/complete/{id}', [CompleteController::class, 'course_question']);
    //curd system of true and false question
    //show all true,false questions
    Route::get('/questions/tf', [TrueFalseController::class, 'index']);
    //add true,false question
    Route::post('/questions/tf', [TrueFalseController::class, 'store']);
    //show one true,false question
    Route::get('/question/tf/{id}', [TrueFalseController::class, 'show']);
    //update true,false question
    Route::put('/question/tf/{tf}', [TrueFalseController::class, 'update']);
    //delete true_false question
    Route::delete('/question/tf/{tf}', [TrueFalseController::class, 'delete']);
    Route::get('/coursequestion/tf/{id}', [TrueFalseController::class, 'course_question']);

    //curd system of Mcq question
    //show all Mcq questions
    Route::get('/questions/Mcq', [McqController::class, 'index']);
    //add Mcq question
    Route::post('/questions/Mcq', [McqController::class, 'store']);
    //show one Mcq question
    Route::get('/question/Mcq/{id}', [McqController::class, 'show']);
    //update Mcq question
    Route::put('/question/Mcq/{Mcq}', [McqController::class, 'update']);
    //delete Mcq question
    Route::delete('/question/Mcq/{id}', [McqController::class, 'delete']);

    Route::get('/coursequestion/mcq/{id}', [McqController::class, 'course_question']);

    //curd system of dynamic Mcq question
    //show all dynamic Mcq questions
    Route::get('/questions/DynamicMcq', [DynamicMcqController::class, 'index']);
    //add dynamic Mcq question
    Route::post('/questions/DynamicMcq', [DynamicMcqController::class, 'store']);
    //show one dynamic Mcq question
    Route::get('/question/DynamicMcq/{id}', [DynamicMcqController::class, 'show']);
    //update dynamic Mcq question
    Route::put('/question/DynamicMcq/{Mcq}', [DynamicMcqController::class, 'update']);
    //delete dynamic Mcq question
    Route::delete('/question/DynamicMcq/{Mcq}', [DynamicMcqController::class, 'delete']);

    //curd system of exam
    //show all exams
    Route::get('/exams', [ExamController::class, 'index']);
    //add exam
    Route::post('/exam', [ExamController::class, 'store']);
    //show one exam
    Route::get('/exam/{id}', [ExamController::class, 'show']);
    //update exam
    Route::put('/exam/{exam}', [ExamController::class, 'update']);
    //delete exam
    Route::delete('/exam/{exam}', [ExamController::class, 'delete']);
    //create exam question
    Route::get('/setQuestion/{id}', [ExamController::class, 'setQuestion']);
    Route::get('/exams/{id}', [ExamController::class, 'course_question']);
    Route::get('/existQuestions', [ExamController::class, 'question_exist']);
    Route::get('/getcomplete/{id}', [ExamController::class, 'get_complete']);
    Route::get('/getmcq/{id}', [ExamController::class, 'get_mcq']);
    Route::get('/gettf/{id}', [ExamController::class, 'get_tf']);
    //import excel sheet
    Route::post('/import/mcq', [McqController::class, 'import']);
    Route::post('/import/complete', [CompleteController::class, 'import']);
    Route::post('/import/tf', [TrueFalseController::class, 'import']);
    Route::post('/import/Dynamicmcq', [DynamicMcqController::class, 'import']);
    Route::get('degree/{id}', [DegreeController::class, 'getDegree']);
});
Route::get('/export/degree/{id}', [DegreeController::class, 'export']);
