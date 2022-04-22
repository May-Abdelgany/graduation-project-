<?php

use App\Http\Controllers\DegreeController;
use App\Http\Controllers\DoExamControler;
use App\Http\Controllers\NextController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'AuthAccess'], function () {
    Route::POST('/exam_id', [DoExamControler::class, 'exam_id']);
    Route::POST('/startExam', [DoExamControler::class, 'startExam']);
    Route::POST('/endexam', [DoExamControler::class, 'end_exam']);
    Route::POST('/startexam', [DoExamControler::class, 'start_exam']);
    Route::POST('/setAnswer', [NextController::class, 'setAnswer']);
    Route::POST('/finish', [NextController::class, 'finish']);
    Route::POST('/degree', [DegreeController::class, 'store']);
});
