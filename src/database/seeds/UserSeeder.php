<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=array(
            array('name'=>'yuta','email'=>'yutahonjo@keio.jp','password'=>Hash::make('2884Hyuta')),
        );
        DB::table('users')->insert($data);
    }

}
