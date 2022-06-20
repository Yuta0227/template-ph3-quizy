<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuizController extends Controller
{
    public function question_lists($big_question_id)
    {
        $quiz_titles=DB::table('big_questions')->where('big_question_id',$big_question_id)->first();
        $pictures=DB::table('pictures')->where('big_question_id',$big_question_id)->get();
        $quiz_length=count($pictures);
        $question_lists=[];
        for($question_id=1;$question_id<=$quiz_length;$question_id++){
            $question_lists_data=DB::table('question_lists')->where('big_question_id',$big_question_id)->where('question_id',$question_id)->get();
            for($choice_id=0;$choice_id<=count($question_lists_data)-1;$choice_id++){
                $question_lists[$question_id][]=$question_lists_data[$choice_id];
            }
            shuffle($question_lists[$question_id]);
        }
        $correct_answers=DB::table("question_lists")->where('big_question_id',$big_question_id)->where('valid',1)->get();
        return view ('quiz.quiz',compact('question_lists','big_question_id','quiz_titles','pictures','correct_answers'));
    }
    // public function quiz_list(){
    //     $quiz_titles=DB::table('big_questions')->get();
    //     return view('quiz.quiz_list',compact('quiz_titles'));
    // }
}
