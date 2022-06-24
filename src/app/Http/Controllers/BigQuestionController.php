<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\BigQuestion;

class BigQuestionController extends Controller
{
    public function index(){
        $user=Auth::user();
        $quiz_titles=BigQuestion::all();
        return view('quiz.quiz_list',compact('quiz_titles','user'));
    }
}
