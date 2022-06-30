<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    public static function getPictures($prefecture_id){
        return self::where('prefecture_id',$prefecture_id)->get();
    }
}
