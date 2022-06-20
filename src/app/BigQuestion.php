<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BigQuestion extends Model
{
    public function scopeBigQuestionIdEqual($query,$big_question_id){
        return $query->where('big_question_id',$big_question_id);
    }
    public function getTitle(){
        return $this->big_question_title;
    }
    public function getId(){
        return $this->big_question_id;
    }
}
