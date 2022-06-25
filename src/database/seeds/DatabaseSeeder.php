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
        $this->call(BigQuestionsSeeder::class);
        $this->call(QuestionListsSeeder::class);
        $this->call(UserSeeder::class);
    }
}
