<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuizController extends Controller
{
    public function question_list($big_question_id)
    {
        $quiz_titles=DB::table('big_question_table')->where('big_question_id',$big_question_id)->first();
        $pictures=DB::table('pictures')->where('big_question_id',$big_question_id)->get();
        $quiz_length=count($pictures);
        $question_list=[];
        for($question_id=1;$question_id<=$quiz_length;$question_id++){
            $question_list_data=DB::table('question_list')->where('big_question_id',$big_question_id)->where('question_id',$question_id)->get();
            for($choice_id=0;$choice_id<=count($question_list_data)-1;$choice_id++){
                $question_list[$question_id][]=$question_list_data[$choice_id];
            }
            shuffle($question_list[$question_id]);
        }
        $correct_answers=DB::table("question_list")->where('big_question_id',$big_question_id)->where('valid',1)->get();
        return view ('quiz.quiz',compact('question_list','big_question_id','quiz_titles','pictures','correct_answers'));
    }
    public function quiz_list(){
        $quiz_titles=DB::table('big_question_table')->get();
        return view('quiz.quiz_list',compact('quiz_titles'));
    }
}
