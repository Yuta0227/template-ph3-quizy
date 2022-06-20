<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    public static function getPictures($big_question_id){
        return self::where('big_question_id',$big_question_id)->get();
    }
}
