<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionList extends Model
{
    public $timestamps=false;
    protected $fillable=[
        'big_question_id','choice_name','question_id','valid'
    ];
}
