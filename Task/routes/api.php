<?php

use App\Http\Controllers\APi\UserController;
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


Route::post('user-register', [UserController::class, 'Register']);
Route::post('user-login', [UserController::class, 'Login']);
Route::post('user-login', [UserController::class, 'Login']);
Route::post('user-find', [UserController::class, 'Find']);
Route::get('user-logout', [UserController::class, 'logout']);
