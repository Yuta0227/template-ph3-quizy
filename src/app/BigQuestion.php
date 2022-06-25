<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BigQuestion extends Model
{
    public $timestamps=false;
    protected $primaryKey='id';
    protected $fillable=[
        'title','id'
    ];
    public static function get_title($big_question_id){
        return self::where('id',$big_question_id)->select('title')->first();
    }
    public function pictures(){
        return $this->hasMany(Picture::class);
    }
    public function choices(){
        return $this->hasMany(QuestionList::class);
    }
    public static $rules=array(
        'id'=>'required',
        'title'=>'required'
    );
}
