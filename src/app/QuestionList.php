<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionList extends Model
{
    public function scopeGetQuizLength($query){
        return $query->distinct('question_id')->count('question_id');
    }
    public function scopeIsCorrect($query){
        return $query->where('valid',1);
    }

    public function scopeQuestionIdEqual($query,$question_id){
        return $query->where('question_id',$question_id);
    }
    public function getQuestionId(){
        return $this->question_id;
    }
}
