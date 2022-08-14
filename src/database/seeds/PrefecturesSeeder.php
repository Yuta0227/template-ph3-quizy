<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PrefecturesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
            ['prefecture_id'=>1,'prefecture_title'=>'東京の難読地名クイズ'],
            ['prefecture_id'=>2,'prefecture_title'=>'広島県の難読地名クイズ']
        ];
        DB::table('prefectures')->insert($data);
    }
}
