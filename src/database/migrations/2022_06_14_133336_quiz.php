<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
        Schema::create('big_question_table', function (Blueprint $table) {
            $table->increments('big_question_id');
            $table->string('big_question_title');
        });

        //質問一覧
        Schema::create('question_list', function (Blueprint $table) {
            $table->integer('big_question_id');
            $table->integer('question_id');
            $table->string('choice_name');
            $table->boolean('valid');
        });

        Schema::create('pictures', function (Blueprint $table) {
            $table->integer('big_question_id');
            $table->integer('question_id');
            $table->string('picture_url');
        });
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
