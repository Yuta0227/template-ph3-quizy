<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BigQuestion extends Model
{
    public function getTitle(){
        return $this->big_question_title;
    }
}
