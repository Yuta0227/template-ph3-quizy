<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuizController extends Controller
{
    public function question_list($big_question_id)
    {
        $quiz_titles=DB::select("select * from big_question_table where big_question_id=$big_question_id");
        $pictures=DB::select("select * from pictures where big_question_id=$big_question_id");
        $quiz_length=count($pictures);
        $question_list=[];
        for($question_id=1;$question_id<=$quiz_length;$question_id++){
            $question_list_data=DB::select("select * from question_list where big_question_id=$big_question_id and question_id=$question_id");
            for($choice_id=0;$choice_id<=count($question_list_data)-1;$choice_id++){
                $question_list[$question_id][]=$question_list_data[$choice_id];
            }
            shuffle($question_list[$question_id]);
        }
        $correct_answers=DB::select("select * from question_list where big_question_id=$big_question_id and valid=1");
        return view ('quiz.quiz',compact('question_list','big_question_id','quiz_titles','pictures','correct_answers'));
    }
    public function quiz_list(){
        $quiz_titles=DB::table("big_question_table")->get();
        return view('quiz.quiz_list',compact('quiz_titles'));
    }
}
