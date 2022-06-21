<?php

namespace App\Http\Controllers;

use App\BigQuestion;
use Illuminate\Http\Request;
use App\QuestionList;

class QuestionListController extends Controller
{
    public function questions($big_question_id){
        $question_lists=[];
        $quiz_length=$this->quiz_length($big_question_id);
        for($question_id=1;$question_id<=$quiz_length;$question_id++){
            $choices=BigQuestion::find($big_question_id)->choices()->questionIdEqual($question_id)->get();
            $choices=$choices->shuffle();
            array_push($question_lists,$choices);
        }
        return $question_lists;
    }
     function quiz_length($big_question_id){
        return BigQuestion::find($big_question_id)->choices()->getQuizLength();
    }
    public function correct_answer($big_question_id){
        $quiz_length=$this->quiz_length($big_question_id);
        $correct_answer_array=[];
        for($question_id=1;$question_id<=$quiz_length;$question_id++){
            $correct_answer=BigQuestion::find($big_question_id)->choices()->questionIdEqual($question_id)->isCorrect()->first();
            array_push($correct_answer_array,$correct_answer);
        }
        return $correct_answer_array;
    }
}
