<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BigQuestion extends Model
{
    protected $primaryKey='id';
    public static function get_title($big_question_id){
        return self::where('id',$big_question_id)->select('title')->first();
    }
    public function pictures(){
        return $this->hasMany(Picture::class);
    }
}
