<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PracticeQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('practice_questions')->insert(['id' => 1, 'text' => 'wow rlly', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        DB::table('practice_questions')->insert(['id' => 2,'text' => 'That\'s great!', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        DB::table('practice_questions')->insert(['id' => 3,'text' => 'when u comin over?', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        DB::table('practice_questions')->insert(['id' => 4,'text' => 'Who is this? 🤔', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        DB::table('practice_questions')->insert(['id' => 5,'text' => 'Thanks for stopping by!', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
    }
}
