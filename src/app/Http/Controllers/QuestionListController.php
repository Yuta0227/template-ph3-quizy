<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\QuestionList;

class QuestionListController extends Controller
{
    public function questions($big_question_id){
        $question_list_object=new QuestionList();
        $question_lists=[];
        $quiz_length=count($question_list_object::getQuizLength($big_question_id)->get());
        for($question_id=1;$question_id<=$quiz_length;$question_id++){
            $choices=$question_list_object::getChoices($big_question_id,$question_id)->get();
            $choices=$choices->shuffle();
            array_push($question_lists,$choices);
        }
        return $question_lists;
    }
    public function correctAnswer($big_question_id){
        $question_list_object=new QuestionList();
        $quiz_length=count($question_list_object::getQuizLength($big_question_id)->get());
        $correct_answer_array=[];
        for($question_id=1;$question_id<=$quiz_length;$question_id++){
            $correct_answer=$question_list_object::getCorrect($big_question_id,$question_id)->first();
            array_push($correct_answer_array,$correct_answer);
        }
        return $correct_answer_array;
    }
}
