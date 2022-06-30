<?php

namespace App\Http\Controllers;

use App\Prefecture;
use Illuminate\Http\Request;

class PrefectureController extends Controller
{
    public function all_titles(){
        $quiz_titles=Prefecture::all();
        return view('quiz.quiz_list',compact('quiz_titles'));
    }
}
