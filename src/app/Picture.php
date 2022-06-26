<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    public $timestamps=false;
    protected $fillable=[
        'big_question_id','question_id','picture_url'
    ];
    public static function getPictures($big_question_id){
        return self::where('big_question_id',$big_question_id)->sortBy('question_id')->get();
    }
}
