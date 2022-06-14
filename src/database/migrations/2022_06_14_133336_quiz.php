<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
class Quiz extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //クイズのタイトル
        Schema::create('big_question_table',function(Blueprint $table){
            $table->increments('big_question_id');
            $table->string('big_question_title');
        });
        $data=array(
            array('big_question_title'=>'東京の難読地名クイズ'),
            array('big_question_title'=>'広島県の難読地名クイズ')
        );
        DB::table('big_question_table')->insert($data);
        //質問一覧
        Schema::create('question_list',function(Blueprint $table){
            $table->integer('big_question_id');
            $table->integer('question_id');
            $table->string('choice_name');
            $table->boolean('valid');
        });
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
        Schema::create('pictures',function(Blueprint $table){
            $table->integer('big_question_id');
            $table->integer('question_id');
            $table->string('picture_url');
        });
        $data=array(
            array('big_question_id'=>1,'question_id'=>1,'picture_url'=>'takanawa.png'),
            array('big_question_id'=>1,'question_id'=>2,'picture_url'=>'kameido.png'),
            array('big_question_id'=>1,'question_id'=>3,'picture_url'=>'koujimachi.png'),
            array('big_question_id'=>2,'question_id'=>1,'picture_url'=>'mukainada.png'),
            array('big_question_id'=>2,'question_id'=>2,'picture_url'=>'oshirabe.png'),
            array('big_question_id'=>2,'question_id'=>3,'picture_url'=>'ginzan.png'),
        );
        DB::table('pictures')->insert($data);
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('big_question_table');
        Schema::dropIfExists('question_list');
        Schema::dropIfExists('pictures');
    }

}
