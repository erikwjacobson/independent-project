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
            //Thoughtful
            [
                'style_id' => $abbreviation,
                'text' => 'Lol glad u thought of me',
                'emotion_id' => $positive
            ],
            [
                'style_id' => $grammatical,
                'text' => 'That was very thoughtful of you to send me flowers!',
                'emotion_id' => $positive
            ],
            [
                'style_id' => $emoji,
                'text' => 'Thank you for the birthday gift, can’t believe you remembered. _',
                'emotion_id' => $positive
            ],
            //Honest
            [
                'style_id' => $abbreviation,
                'text' => 'Ur good thx for bein honest',
                'emotion_id' => $positive
            ],
            [
                'style_id' => $grammatical,
                'text' => 'I value your honesty.',
                'emotion_id' => $positive
            ],
            [
                'style_id' => $emoji,
                'text' => 'You know I will always tell you the truth. _',
                'emotion_id' => $positive
            ],
            //Joyful
            [
                'style_id' => $abbreviation,
                'text' => 'omg im so happy 4 u',
                'emotion_id' => $positive
            ],
            [
                'style_id' => $grammatical,
                'text' => 'I was so happy to see you last, glad the feelings are mutual!',
                'emotion_id' => $positive
            ],
            [
                'style_id' => $emoji,
                'text' => 'Christmas is my favorite holiday! _',
                'emotion_id' => $positive
            ],
            //Elated
            [
                'style_id' => $abbreviation,
                'text' => 'ur date tmrw is gonna b gr8',
                'emotion_id' => $positive
            ],
            [
                'style_id' => $grammatical,
                'text' => 'That dress makes me feel so sexy!',
                'emotion_id' => $positive
            ],
            [
                'style_id' => $emoji,
                'text' => 'Yes, he finally sent me a text back! _',
                'emotion_id' => $positive
            ],
            //Skeptical
            [
                'style_id' => $abbreviation,
                'text' => 'Yo i think ur bro is startin ta be onto us',
                'emotion_id' => $neutral
            ],
            [
                'style_id' => $grammatical,
                'text' => 'What made them ask that?',
                'emotion_id' => $neutral
            ],
            [
                'style_id' => $emoji,
                'text' => 'I don’t know, _ everyone is acting funny',
                'emotion_id' => $neutral
            ],
            //Serious
            [
                'style_id' => $abbreviation,
                'text' => 'The play tonight is making me nervous. _',
                'emotion_id' => $neutral
            ],
            [
                'style_id' => $grammatical,
                'text' => 'I can’t make it, I have work to do.',
                'emotion_id' => $neutral
            ],
            [
                'style_id' => $emoji,
                'text' => 'Yea k',
                'emotion_id' => $neutral
            ],
            //Indifferent
            [
                'style_id' => $abbreviation,
                'text' => 'Idc u decide',
                'emotion_id' => $neutral
            ],
            [
                'style_id' => $grammatical,
                'text' => 'You can do whatever you want to do.',
                'emotion_id' => $neutral
            ],
            [
                'style_id' => $emoji,
                'text' => 'I don’t care where we eat, I’m just hungry. _',
                'emotion_id' => $neutral
            ],
            //Weary
            [
                'style_id' => $abbreviation,
                'text' => 'I dont rlly like bein l8',
                'emotion_id' => $neutral
            ],
            [
                'style_id' => $grammatical,
                'text' => 'I almost fell asleep in the middle of class.',
                'emotion_id' => $neutral
            ],
            [
                'style_id' => $emoji,
                'text' => 'I have depression, so a nap would probably help. _',
                'emotion_id' => $neutral
            ],
            //Hostile
            [
                'style_id' => $abbreviation,
                'text' => 'Smh, gtfo here with that crap',
                'emotion_id' => $negative
            ],
            [
                'style_id' => $grammatical,
                'text' => 'Don’t expect me to help you next time you’re involved.',
                'emotion_id' => $negative
            ],
            [
                'style_id' => $emoji,
                'text' => 'No, I don’t like you around _',
                'emotion_id' => $negative
            ],
            //Aggressive
            [
                'style_id' => $abbreviation,
                'text' => 'Im not playin’ im bout ta thro hands',
                'emotion_id' => $negative
            ],
            [
                'style_id' => $grammatical,
                'text' => 'Talk to me like that one more time, I dare you.',
                'emotion_id' => $negative
            ],
            [
                'style_id' => $emoji,
                'text' => 'You’re coming regardless of what you want _!',
                'emotion_id' => $negative
            ],
            //Cruel
            [
                'style_id' => $abbreviation,
                'text' => 'Yea i pawned the ring 4 money',
                'emotion_id' => $negative
            ],
            [
                'style_id' => $grammatical,
                'text' => 'Yeah, you could have made a cuter baby.',
                'emotion_id' => $negative
            ],
            [
                'style_id' => $emoji,
                'text' => 'I bleached all of your clothes last night',
                'emotion_id' => $negative
            ],
            //Evil
            [
                'style_id' => $abbreviation,
                'text' => 'So lik ur cat is ded nd im da 1 that did it',
                'emotion_id' => $negative
            ],
            [
                'style_id' => $grammatical,
                'text' => 'Your leftovers were taking up the fridge anyway, so I ate it.',
                'emotion_id' => $negative
            ],
            [
                'style_id' => $emoji,
                'text' => 'You have insurance to cover the crash, so… _',
                'emotion_id' => $negative
            ],
        ];

        foreach($a as $array) {
            Sentence::create($array);
        }
    }
}
