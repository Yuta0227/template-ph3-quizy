<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class quiz extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=array(
            array('big_question_title'=>'東京の難読地名クイズ'),
            array('big_question_title'=>'広島県の難読地名クイズ')
        );
        DB::table('big_question_table')->insert($data);
        $data=array(
            array('big_question_id'=>1,'question_id'=>1,'choice_name'=>'こうわ','valid'=>0),
            array('big_question_id'=>1,'question_id'=>1,'choice_name'=>'たかわ','valid'=>0),
            array('big_question_id'=>1,'question_id'=>1,'choice_name'=>'たかなわ','valid'=>1),
            array('big_question_id'=>1,'question_id'=>2,'choice_name'=>'かめど','valid'=>0),
            array('big_question_id'=>1,'question_id'=>2,'choice_name'=>'かめと','valid'=>0),
            array('big_question_id'=>1,'question_id'=>2,'choice_name'=>'かめいど','valid'=>1),
            array('big_question_id'=>1,'question_id'=>3,'choice_name'=>'おかとまち','valid'=>0),
            array('big_question_id'=>1,'question_id'=>3,'choice_name'=>'かゆまち','valid'=>0),
            array('big_question_id'=>1,'question_id'=>3,'choice_name'=>'こうじまち','valid'=>1),
            array('big_question_id'=>2,'question_id'=>1,'choice_name'=>'むきひら','valid'=>0),
            array('big_question_id'=>2,'question_id'=>1,'choice_name'=>'むこうひら','valid'=>0),
            array('big_question_id'=>2,'question_id'=>1,'choice_name'=>'むかいなだ','valid'=>1),
            array('big_question_id'=>2,'question_id'=>2,'choice_name'=>'みつぎ','valid'=>0),
            array('big_question_id'=>2,'question_id'=>2,'choice_name'=>'みよし','valid'=>0),
            array('big_question_id'=>2,'question_id'=>2,'choice_name'=>'おしらべ','valid'=>1),
            array('big_question_id'=>2,'question_id'=>3,'choice_name'=>'きやま','valid'=>0),
            array('big_question_id'=>2,'question_id'=>3,'choice_name'=>'かなやま','valid'=>0),
            array('big_question_id'=>2,'question_id'=>3,'choice_name'=>'ぎんざん','valid'=>1),
        );
        DB::table('question_list')->insert($data);
        $data=array(
            array('big_question_id'=>1,'question_id'=>1,'picture_url'=>'たかなわ.png'),
            array('big_question_id'=>1,'question_id'=>2,'picture_url'=>'かめいど.png'),
            array('big_question_id'=>1,'question_id'=>3,'picture_url'=>'こうじまち.png'),
            array('big_question_id'=>2,'question_id'=>1,'picture_url'=>'むかいなだ.png'),
            array('big_question_id'=>2,'question_id'=>2,'picture_url'=>'おしらべ.png'),
            array('big_question_id'=>2,'question_id'=>3,'picture_url'=>'ぎんざん.png'),
        );
        DB::table('pictures')->insert($data);
    }
}
