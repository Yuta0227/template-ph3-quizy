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
            ['prefecture_id'=>1,'question_id'=>1,'picture_url'=>'たかなわ.png'],
            ['prefecture_id'=>1,'question_id'=>2,'picture_url'=>'かめいど.png'],
            ['prefecture_id'=>1,'question_id'=>3,'picture_url'=>'こうじまち.png'],
            ['prefecture_id'=>2,'question_id'=>4,'picture_url'=>'むかいなだ.png'],
            ['prefecture_id'=>2,'question_id'=>5,'picture_url'=>'みつぎ.png'],
            ['prefecture_id'=>2,'question_id'=>6,'picture_url'=>'かなやま.png'],
        ];
        DB::table('pictures')->insert($data);
    }
}
