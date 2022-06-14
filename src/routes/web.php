<?php

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

// use App\Http\Controllers\QuizController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('quiz_list', function () {
    return view('quiz.quiz_list');
})->name('quiz.quiz_list');
Route::get('quiz/{big_question_id}', 'QuizController@quiz_list')->name('quiz.quiz');

