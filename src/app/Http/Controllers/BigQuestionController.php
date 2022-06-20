<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BigQuestion;

class BigQuestionController extends Controller
{
    public function title($big_question_id){
        return BigQuestion::bigQuestionIdEqual($big_question_id)->first();
    }
    public function all_titles(){
        $quiz_titles=BigQuestion::all();
        return view('quiz.quiz_list',compact('quiz_titles'));
    }
}
