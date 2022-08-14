<?php

namespace App\Http\Controllers;

use App\Prefecture;
use App\Picture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuizController extends Controller
{
    public function question_lists($prefecture_id)
    {
        $quiz_title = Prefecture::get_title($prefecture_id)->prefecture_title;
        $pictures = Prefecture::with('pictures')->find($prefecture_id)->pictures;
        $call_question_list = app()->make('App\Http\Controllers\QuestionListController');
        $question_lists = $call_question_list->questions($prefecture_id);
        $call_correct_answers = app()->make('App\Http\Controllers\QuestionListController');
        $correct_answers_array = $call_correct_answers->correct_answer($prefecture_id);
        return view('quiz.quiz', compact('question_lists', 'quiz_title', 'prefecture_id', 'pictures', 'correct_answers_array'));
    }
    public function quiz_list()
    {
        $quiz_titles = DB::table('prefectures')->get();
        return view('quiz.quiz_list', compact('quiz_titles'));
    }
}
