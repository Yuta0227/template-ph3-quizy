<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BigQuestion extends Model
{
    public function scopeBigQuestionIdEqual($query,$big_question_id){
        return $query->where('big_question_id',$big_question_id);
    }
    public static function getTitle($big_question_id){
        return self::where('big_question_id',$big_question_id)->select('big_question_title')->first();
    }
}
