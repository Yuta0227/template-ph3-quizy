<?php

namespace App\Http\Controllers;

use App\BigQuestion;
use Illuminate\Http\Request;
use App\QuestionList;

class QuestionListController extends Controller
{
    public function questions($big_question_id){
        $question_list_object=new QuestionList();
        $question_lists=[];
        $quiz_length=$this->quiz_length($big_question_id);
        for($question_id=1;$question_id<=$quiz_length;$question_id++){
            $choices=$question_list_object::bigQuestionIdEqual($big_question_id)->questionIdEqual($question_id)->get();
            $choices=$choices->shuffle();
            array_push($question_lists,$choices);
        }
        return $question_lists;
    }
     function quiz_length($big_question_id){
        $question_list_object=new QuestionList();
        return $question_list_object::bigQuestionIdEqual($big_question_id)->getQuizLength();
    }
    public function correct_answer($big_question_id){
        $question_list_object=new QuestionList();
        $quiz_length=$this->quiz_length($big_question_id);
        $correct_answer_array=[];
        for($question_id=1;$question_id<=$quiz_length;$question_id++){
            $correct_answer=$question_list_object::bigQuestionIdEqual($big_question_id)->questionIdEqual($question_id)->isCorrect()->first();
            array_push($correct_answer_array,$correct_answer);
        }
        return $correct_answer_array;
    }
}
