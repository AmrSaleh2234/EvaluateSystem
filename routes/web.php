<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Route;

define('PAGINATION_NUMBERS',10);
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
    return redirect('/home');
});


Route::get('/client', [App\Http\Controllers\ClientController::class, 'getall'])->name('client');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*===========================routes profile =====================================*/
Route::get('profile',[\App\Http\Controllers\profile\ProfileController::class,'profile'])->name('profile.index');
Route::post('profile/edit_password/{user}',[\App\Http\Controllers\profile\ProfileController::class,'editPassword'])->name('profile.editPassword');
Route::post('profile/update_image/{user}',[\App\Http\Controllers\profile\ProfileController::class,'editPhoto'])->name('profile.editPhoto');
######################################################end profile ###############################
Route::post('quiz/view/{q}/{course}',[\App\Http\Controllers\QuizController::class,'quizView'])->name('quiz.view');
Route::post('quiz/result/{id}',[\App\Http\Controllers\QuizController::class,'result'])->name('quiz.result');
Route::get('quiz/grade/{quiz}',[\App\Http\Controllers\QuizController::class,'gradesForQuize'])->name('quiz.grades');
Route::get('student/grade',[\App\Http\Controllers\QuizController::class,'gradesForUser'])->name('student.grades');
Route::get('quiz/create/{id}',[\App\Http\Controllers\QuizController::class,'create'])->name('quiz.create');
Route::post('quiz/store/{course}',[\App\Http\Controllers\QuizController::class,'store'])->name('quiz.store');
Route::get('quiz/verification/{id}/{course}',[\App\Http\Controllers\QuizController::class,'verification'])->name('quiz.verification');

Route::resource('quiz','QuizController')->except('index','create','store');
