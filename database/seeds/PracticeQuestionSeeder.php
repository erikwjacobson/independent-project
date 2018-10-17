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
        DB::table('practice_questions')->insert(['text' => 'wow rlly', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        DB::table('practice_questions')->insert(['text' => 'That\'s great!', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        DB::table('practice_questions')->insert(['text' => 'when u comin over?', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        DB::table('practice_questions')->insert(['text' => 'Who is this? 🤔', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        DB::table('practice_questions')->insert(['text' => 'Thanks for stopping by!', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
    }
}
