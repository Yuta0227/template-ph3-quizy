<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PicturesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=array(
            array('big_question_id'=>1,'question_id'=>1,'picture_url'=>'たかなわ.png'),
            array('big_question_id'=>1,'question_id'=>2,'picture_url'=>'かめいど.png'),
            array('big_question_id'=>1,'question_id'=>3,'picture_url'=>'こうじまち.png'),
            array('big_question_id'=>2,'question_id'=>1,'picture_url'=>'むかいなだ.png'),
            array('big_question_id'=>2,'question_id'=>2,'picture_url'=>'みつぎ.png'),
            array('big_question_id'=>2,'question_id'=>3,'picture_url'=>'かなやま.png'),
        );
        DB::table('pictures')->insert($data);
    }
}
