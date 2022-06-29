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
        $data=[
            ['big_question_id'=>1,'question_id'=>1,'picture_url'=>'たかなわ.png'],
            ['big_question_id'=>1,'question_id'=>2,'picture_url'=>'かめいど.png'],
            ['big_question_id'=>1,'question_id'=>3,'picture_url'=>'こうじまち.png'],
            ['big_question_id'=>2,'question_id'=>1,'picture_url'=>'むかいなだ.png'],
            ['big_question_id'=>2,'question_id'=>2,'picture_url'=>'おしらべ.png'],
            ['big_question_id'=>2,'question_id'=>3,'picture_url'=>'ぎんざん.png'],
        ];
        DB::table('pictures')->insert($data);
    }
}
