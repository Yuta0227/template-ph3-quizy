<?php

namespace App\Http\Controllers;

use App\BigQuestion;
use App\Picture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuizController extends Controller
{
    public function question_lists($big_question_id)
    {
        $quiz_title=BigQuestion::get_title($big_question_id)->big_question_title;
        $pictures=BigQuestion::with('pictures')->find($big_question_id)->pictures;
        $call_question_list=app()->make('App\Http\Controllers\QuestionListController');
        $question_lists=$call_question_list->questions($big_question_id);
        $call_correct_answers=app()->make('App\Http\Controllers\QuestionListController');
        $correct_answers_array=$call_correct_answers->correct_answer($big_question_id);
        return view ('quiz.quiz',compact('question_lists','quiz_title','big_question_id','pictures','correct_answers_array'));
    }
}
