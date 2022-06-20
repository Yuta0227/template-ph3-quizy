<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionList extends Model
{
    public function scopeGetQuizLength($query,$big_question_id){
        return $query->where('big_question_id',$big_question_id)->distinct()->select('question_id');
    }
    public function scopeGetChoices($query,$big_question_id,$question_id){
        return $query->where('big_question_id',$big_question_id)->where('question_id',$question_id)->select('question_id','choice_name','valid');
    }
    public function scopeGetCorrect($query,$big_question_id,$question_id){
        return $query->where('big_question_id',$big_question_id)->where('question_id',$question_id)->where('valid',1)->select('choice_name');
    }
    public function getQuestionId(){
        return $this->question_id;
    }
}
