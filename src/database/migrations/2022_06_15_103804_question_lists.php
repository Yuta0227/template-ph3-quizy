<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class QuestionLists extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //質問一覧
        Schema::create('question_lists', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->integer('prefecture_id');
            $table->integer('question_id');
            $table->string('choice_name');
            $table->boolean('valid');
            $table->index('question_id');
            $table->foreign('question_id')->references('question_id')->on('pictures')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('prefecture_id')->references('prefecture_id')->on('prefectures')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('question_lists');
    }
}
