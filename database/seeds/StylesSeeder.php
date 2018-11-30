<?php

use App\Style;
use Illuminate\Database\Seeder;

class StylesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $a = [
            ['id' => 1,'name' => 'Abbreviation', 'description' => 'Abbreviation style will consist of less than 15 words, not include any punctuation, and include a number of abbreviations.'],
            ['id' => 2,'name' => 'Grammatical', 'description' => 'Grammatical style will consist of full punctuation and clear, grammatically correct expressions.'],
            ['id' => 3,'name' => 'Emoji', 'description' => 'Emoji style will consist of a combination of grammatical style and the use of emojis, which will be chosen from a set of specific and unbiased emojis.']
        ];

        foreach($a as $array) {
            Style::create($array);
        }
    }
}
