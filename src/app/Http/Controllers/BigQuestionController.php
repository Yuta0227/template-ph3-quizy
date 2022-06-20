<?php

namespace App\Http\Controllers;

use App\BigQuestion;

class BigQuestionController extends Controller
{
    public function all_titles(){
        $quiz_titles=BigQuestion::all();
        return view('quiz.quiz_list',compact('quiz_titles'));
    }
}
