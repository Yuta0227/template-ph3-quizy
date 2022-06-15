<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BigQuestionTableSeeder extends Seeder
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
    }
}
