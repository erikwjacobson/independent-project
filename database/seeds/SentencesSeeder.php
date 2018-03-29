<?php

use App\Emotion;
use App\Sentence;
use App\Style;
use Illuminate\Database\Seeder;

class SentencesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $abbreviation = Style::where('name', 'Abbreviation')->first()->id;
        $grammatical = Style::where('name', 'Grammatical')->first()->id;
        $emoji = Style::where('name', 'Emoji')->first()->id;

        $positive = Emotion::where('name', 'Positive')->first()->id;
        $neutral = Emotion::where('name', 'Neutral')->first()->id;
        $negative = Emotion::where('name', 'Negative')->first()->id;

        $a = [
            ['style_id' => $abbreviation, 'text' => 'brb hav to mk wrds haha', 'emotion_id' => $positive],
            ['style_id' => $grammatical, 'text' => 'Be right back I have to do this homework assignment.', 'emotion_id' => $neutral],
            ['style_id' => $emoji, 'text' => 'God damnit I have to do this asignment 😃', 'emotion_id' => $negative],
        ];

        foreach($a as $array) {
            Sentence::create($array);
        }
    }
}
