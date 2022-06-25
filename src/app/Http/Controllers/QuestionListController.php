<?php

namespace App\Http\Controllers;

use App\BigQuestion;
use Illuminate\Http\Request;
use App\QuestionList;

class QuestionListController extends Controller
{
    public function load_choices($big_question_id)
    {
        return BigQuestion::with('choices')->find($big_question_id)->choices;
    }
    public function shuffled_questions($big_question_id)
    {
        $question_lists = [];
        $quiz_length = $this->quiz_length($big_question_id);
        $choices = $this->load_choices($big_question_id);
        for ($question_id = 1; $question_id <= $quiz_length; $question_id++) {
            $before_shuffle = [];
            $before_shuffle = $choices->filter(function ($choice) use ($question_id) {
                return $choice->question_id == $question_id;
            });
            $after_shuffle = $before_shuffle->shuffle();
            array_push($question_lists, $after_shuffle);
        }
        return $question_lists;
    }
    public function unshuffled_questions($big_question_id){
        $question_lists = [];
        $quiz_length = $this->quiz_length($big_question_id);
        $choices = $this->load_choices($big_question_id);
        for ($question_id = 1; $question_id <= $quiz_length; $question_id++) {
            $choices_array = [];
            $choices_array = $choices->filter(function ($choice) use ($question_id) {
                return $choice->question_id == $question_id;
            });
            array_push($question_lists, $choices_array);
        }
        return $question_lists;
    }
    function quiz_length($big_question_id)
    {
        return count($this->load_choices($big_question_id)->unique('question_id'));
    }
    public function correct_answer($big_question_id)
    {
        $correct_answer_array = [];
        $correct_answer = $this->load_choices($big_question_id)
            ->filter(function ($choice) {
                return $choice->valid == true;
            })->all();
        foreach ($correct_answer as $answer) {
            //$correct_answerだとキーが設定されてるため取得が無理。pushしなおすとキーがなくなる
            //こういうコードの意図を説明するようなコメントは残すべき？
            array_push($correct_answer_array, $answer);
        }
        return $correct_answer_array;
    }
}
