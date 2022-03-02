<?php

use App\Http\Controllers\APi\StudentController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('student-register', [StudentController::class, 'studentRegister']);
Route::post('student-login', [StudentController::class, 'studentLogin']);
Route::post('student-login', [StudentController::class, 'studentLogin']);
Route::post('student-find', [StudentController::class, 'studentFind']);
Route::get('student-logout', [StudentController::class, 'studentlogout']);

