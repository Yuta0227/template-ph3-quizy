<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prefecture extends Model
{
    protected $table="prefectures";
    protected $primaryKey='prefecture_id';
    public static function get_title($prefecture_id){
        return self::where('prefecture_id',$prefecture_id)->first();
    }
    public function pictures(){
        return $this->hasMany(Picture::class,'prefecture_id','prefecture_id');
    }
    public function choices(){
        return $this->hasMany(QuestionList::class,'prefecture_id','prefecture_id');
    }
}
