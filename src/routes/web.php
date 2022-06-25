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
use Illuminate\Support\Facades\Auth;
Route::get('/', function () {
    return view('welcome');
});
Route::get('/quiz_list', 'BigQuestionController@index')->name('quiz.question_lists');
Route::get('/quiz/{big_question_id}', 'QuizController@question_lists')->name('quiz.quiz');
Auth::routes();


Route::get('/home', 'HomeController@index');
Route::post('/edit_title','HomeController@edit_title');
Route::post('/add_title','HomeController@add_title');
