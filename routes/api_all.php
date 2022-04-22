<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\McqController;
use App\Http\Controllers\DynamicMcqController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ChangePassword;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DegreeController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\CompleteController;
use App\Http\Controllers\ForgetPassword;
use App\Http\Controllers\TrueFalseController;

Route::post('signup', [SignupController::class, 'addNew']);
Route::post('/login', [LoginController::class, 'login']);
Route::get('/degrees', [DegreeController::class, 'index']);
Route::post('/forget-password', [ForgetPassword::class, 'store']);

Route::post('/reset-password', [ForgetPassword::class, 'createNewPassword']);
Route::group(['auth:api', 'middleware' => 'AuthAccess'], function () {
    /*show all courses*/
    Route::get('/courses', [CourseController::class, 'index']);
});
