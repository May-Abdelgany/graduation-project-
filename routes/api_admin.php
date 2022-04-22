<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollController;
use App\Http\Controllers\EnrollTeachersController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Models\Course;

Route::group(['auth:api', 'middleware' => 'AuthAccess'], function () {

    Route::get('/users', [UserController::class, 'index']);

    /*crud system of admin*/
    /*show all admins in the system*/
    Route::get('/admins', [AdminController::class, 'index']);
    /*show admin in the system*/
    Route::get('/admins/{id}', [AdminController::class, 'show']);
    /*add admin to the system*/
    Route::post('/admins', [AdminController::class, 'store']);
    /*update data of admin in the system */
    Route::put('/admins/{admin}', [AdminController::class, 'update']);
    /*delete admin in the system */
    Route::delete('/admins/{id}', [AdminController::class, 'delete']);


    /*crud system of teacher*/
    /*show all teachers in the system*/
    Route::get('/teachers', [TeacherController::class, 'index']);
    /*add teacher to the system*/
    Route::post('/teachers', [TeacherController::class, 'store']);
    /*show teacher in the system*/
    Route::get('/teachers/{id}', [TeacherController::class, 'show']);
    /*update data of teacher in the system */
    Route::put('/teachers/{teacher}', [TeacherController::class, 'update']);
    /*delete teacher in the system */
    Route::delete('/teachers/{id}', [TeacherController::class, 'delete']);
    Route::get('/teacher/{id}', [TeacherController::class, 'teacherId']);

    /*crud system of student*/
    /*show all students in the system*/
    Route::get('/students', [StudentController::class, 'index']);
    /*add student to the system*/
    Route::post('/students', [StudentController::class, 'store']);
    /*show student in the system*/
    Route::get('/students/{id}', [StudentController::class, 'show']);
    /*update data of student in the system */
    Route::put('/students/{student}', [StudentController::class, 'update']);
    /*delete student in the system */
    Route::delete('/students/{id}', [StudentController::class, 'delete']);
    Route::get('/student/{id}', [StudentController::class, 'studentId']);

    /*crud system of course*/
    /*add course*/
    Route::post('/courses', [CourseController::class, 'store']);
    /*update course */
    Route::put('/courses/{course}', [CourseController::class, 'update']);
    /*delete course*/
    Route::delete('/courses/{course}', [CourseController::class, 'delete']);
    /*show course*/
    Route::get('/courses/{id}', [CourseController::class, 'show']);


    /*show students in course*/
    Route::get('/course/students/{id}', [EnrollController::class, 'show']);
    /*add student to course*/
    Route::post('/enroll/student', [EnrollController::class, 'store']);
    /*update students in course*/
    Route::put('enroll/student/{enroll}', [EnrollController::class, 'update']);
    /*delete enroll student*/
    Route::delete('/enroll/student/{enroll}', [EnrollController::class, 'delete']);
    Route::post('/enroll/getId', [EnrollController::class, 'enroll']);


    /*add teacher to course*/
    Route::post('/enroll/teacher', [EnrollTeachersController::class, 'store']);
    /*show teachers of course*/
    Route::get('/course/teachers/{id}', [EnrollTeachersController::class, 'show']);
    /*update teachers in course*/
    Route::put('enroll/teacher/{enroll}', [EnrollTeachersController::class, 'update']);
    /*delete enroll student*/
    Route::delete('/enroll/teacher/{enroll}', [EnrollTeachersController::class, 'delete']);
    Route::post('/enroll/getenrollId', [EnrollTeachersController::class, 'enroll']);
});
