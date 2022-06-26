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
Route::post('/delete_title','HomeController@delete_title');
Route::post('/switch_titles','HomeController@switch_titles');
Route::post('/delete_choice/{big_question_id}','HomeController@delete_choice');
Route::post('/edit_choice/{big_question_id}','HomeController@edit_choice');
Route::post('/add_choice/{big_question_id}','HomeController@add_choice');
Route::post('/add_question/{big_question_id}','HomeController@add_question');
Route::post('/delete_question/{big_question_id}/{question_id}','HomeController@delete_question');
Route::get('/edit_title',function(){
    return view('/home');
});
Route::get('/add_title',function(){
    return view('/home');
});
Route::get('/delete_title',function(){
    return view('/home');
});
Route::get('/switch_title',function(){
    return view('/home');
});
Route::get('/delete_choice/{big_question_id}',function(){
    return view('/home');
});
Route::get('/edit_choice/{big_question_id}',function(){
    return view('/home');
});
Route::get('/add_choice/{big_question_id}',function(){
    return view('/home');
});
Route::get('/add_question/{big_question_id',function(){
    return view('/home');
});
Route::get('/edit_quiz/{big_question_id}','HomeController@get_questions_to_edit');
