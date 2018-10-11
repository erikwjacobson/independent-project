<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(EmotionsSeeder::class);
        $this->call(StylesSeeder::class);
        $this->call(SentencesSeeder::class);
        $this->call(DemographicSeeder::class);
        $this->call(PracticeQuestionSeeder::class);
    }
}
