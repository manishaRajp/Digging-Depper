<?php

use App\Events\MessageNotification;
use App\Http\Controllers\ExampleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('event',function(){
  event(new MessageNotification('Here the new notification by broadcasting......'));
});

Route::get('/listen',function(){
    return view('listen');
});



Route::get('cache', [ExampleController::class, 'chache']);

Route::get('contracts', [ExampleController::class, 'contracts']);

Route::get('collaction',[ExampleController::class, 'collaction']);

Route::get('/send-mail', [ExampleController::class, 'mail'])->name('mail_send');

Route::get('/event2', [ExampleController::class, 'eventexample'])->name('event');


// Route::get('/lang', [ExampleController::class, 'Localization'])->name('lang');

Route::get('localization/{locale}',[ExampleController::class, 'Localization']);

