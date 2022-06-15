<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PicturesSeeder::class);
        $this->call(BigQuestionTableSeeder::class);
        $this->call(QuestionListSeeder::class);
    }
}
