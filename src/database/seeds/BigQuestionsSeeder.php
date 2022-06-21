<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BigQuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=array(
            array('title'=>'東京の難読地名クイズ'),
            array('title'=>'広島県の難読地名クイズ')
        );
        DB::table('big_questions')->insert($data);
    }
}
