<?php

namespace App\Http\Controllers;

use App\Picture;
use App\Prefecture;
use Illuminate\Http\Request;
use App\QuestionList;


class QuestionListController extends Controller
{
    public function load_choices($prefecture_id)
    {
        return Prefecture::with('choices')->find($prefecture_id)->choices;
    }
    public function questions($prefecture_id)
    {
        $question_lists = [];
        $quiz_length = $this->quiz_length($prefecture_id);
        $pictures=Picture::where('prefecture_id',$prefecture_id)->get();
        $choices = $this->load_choices($prefecture_id);
        for ($question_id = 1; $question_id <= $quiz_length; $question_id++) {
            $before_shuffle = [];
            $before_shuffle = $choices->filter(function ($choice) use ($pictures,$question_id) {
                return $choice->question_id == $pictures[$question_id-1]->question_id;
            });
            $after_shuffle = $before_shuffle->shuffle();
            array_push($question_lists, $after_shuffle);
        }
        return $question_lists;
    }
    function quiz_length($prefecture_id)
    {
        return count($this->load_choices($prefecture_id)->unique('question_id'));
    }
    public function correct_answer($prefecture_id)
    {
        $correct_answer_array = [];
        $correct_answer = $this->load_choices($prefecture_id)
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
