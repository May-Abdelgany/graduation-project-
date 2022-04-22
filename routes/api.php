<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

/* test Routes */
Route::group(['middleware' => 'json.response'], function () {

require __DIR__ . "/api_all.php";

/* admin Routes */
require __DIR__ . "/api_admin.php";

/* stuent Routes */
require __DIR__ . "/api_student.php";

/* teacher Routes */
require __DIR__ . "/api_teacher.php";
});
