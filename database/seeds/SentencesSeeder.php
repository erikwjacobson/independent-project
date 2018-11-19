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
            /**
             * Negative
             */
            // abbreviation
            ["style_id" => $abbreviation, "text" => "im in a trbl mood", "value" => -0.93, 'emotion_id' => $negative],
            ["style_id" => $abbreviation, "text" => "im so srry somthn came up and I cant come w/", "value" => -0.89, 'emotion_id' => $negative],
            ["style_id" => $abbreviation, "text" => "i cant blv i fell asleep in class 2day", "value" => -0.87, 'emotion_id' => $negative],
            ["style_id" => $abbreviation, "text" => "wow i cant blv u spoild the movie for us", "value" => -0.81, 'emotion_id' => $negative],
            ["style_id" => $abbreviation, "text" => "ive been waitin for 2 hrs now", "value" => -0.79, 'emotion_id' => $negative],
            ["style_id" => $abbreviation, "text" => "ignore her obv u didnt", "value" => -0.77, 'emotion_id' => $negative],
            ["style_id" => $abbreviation, "text" => "y was there watr all over the flr", "value" => -0.75, 'emotion_id' => $negative],
            ["style_id" => $abbreviation, "text" => "im gonna go lay dwn", "value" => -0.75, 'emotion_id' => $negative],
            ["style_id" => $abbreviation, "text" => "i rlly wish u wouldve told me", "value" => -0.74, 'emotion_id' => $negative],
            ["style_id" => $abbreviation, "text" => "youve chnged so much in the last yr", "value" => -0.7, 'emotion_id' => $negative],
            ["style_id" => $abbreviation, "text" => "y do u still try 2 talk 2 me", "value" => -0.65, 'emotion_id' => $negative],

            // Grammatical
            ["style_id" => $grammatical, "text" => "You’re making this harder than it needs to be.", "value" => -0.9, 'emotion_id' => $negative],
            ["style_id" => $grammatical, "text" => "You seem so distracted lately.", "value" => -0.89, 'emotion_id' => $negative],
            ["style_id" => $grammatical, "text" => "You can’t blame everyone for what you did.", "value" => -0.85, 'emotion_id' => $negative],
            ["style_id" => $grammatical, "text" => "That was really unfair of you to do.", "value" => -0.84, 'emotion_id' => $negative],
            ["style_id" => $grammatical, "text" => "I don't feel comfortable with them around.", "value" => -0.83, 'emotion_id' => $negative],
            ["style_id" => $grammatical, "text" => "This is your last warning.", "value" => -0.8, 'emotion_id' => $negative],
            ["style_id" => $grammatical, "text" => "I barely slept last night.", "value" => -0.78, 'emotion_id' => $negative],
            ["style_id" => $grammatical, "text" => "I was waiting at the wrong one.", "value" => -0.8, 'emotion_id' => $negative],
            ["style_id" => $grammatical, "text" => "I need the money by Wednesday.", "value" => -0.74, 'emotion_id' => $negative],
            ["style_id" => $grammatical, "text" => "If I hear that one more time, I'm going to block you.", "value" => -0.7, 'emotion_id' => $negative],
            ["style_id" => $grammatical, "text" => "I need to know when you're going to be home.", "value" => -0.67, 'emotion_id' => $negative],

            // Emoji
            ["style_id" => $emoji, "text" => "I’m so sorry for your loss. 😢", "value" => -0.92, 'emotion_id' => $negative],
            ["style_id" => $emoji, "text" => "My dog went missing. 😫", "value" => -0.89, 'emotion_id' => $negative],
            ["style_id" => $emoji, "text" => "I'm scared she's going to do something tonight. 😱", "value" => -0.88, 'emotion_id' => $negative],
            ["style_id" => $emoji, "text" => "That really doesn't make sense to me. 😒", "value" => -0.84, 'emotion_id' => $negative],
            ["style_id" => $emoji, "text" => "I didn't want to go. 🤷‍", "value" => -0.82, 'emotion_id' => $negative],
            ["style_id" => $emoji, "text" => "I'm not sure if I'm going to go. 😔", "value" => -0.78, 'emotion_id' => $negative],
            ["style_id" => $emoji, "text" => "So I just kicked my roommate out. 😭", "value" => -0.77, 'emotion_id' => $negative],
            ["style_id" => $emoji, "text" => "Why does this always happen to me? 😭", "value" => -0.75, 'emotion_id' => $negative],
            ["style_id" => $emoji, "text" => "You shouldn't go alone. 😧", "value" => -0.69, 'emotion_id' => $negative],
            ["style_id" => $emoji, "text" => "You really need to talk to her about last night. 😟", "value" => -0.66, 'emotion_id' => $negative],
            ["style_id" => $emoji, "text" => "I can’t wait until this week is over. 😖", "value" => -0.65, 'emotion_id' => $negative],

            /**
             * Neutral
             */
            // abbreviation
            ["style_id" => $abbreviation, "text" => "did u rlly think i wouldnt find out", "value" => 0, "emotion_id" => $neutral],
            ["style_id" => $abbreviation, "text" => "hey i rlly meant wat i said earlier", "value" => 0, "emotion_id" => $neutral],
            ["style_id" => $abbreviation, "text" => "im not in the mood for this rn", "value" => 0, "emotion_id" => $neutral],
            ["style_id" => $abbreviation, "text" => "at least youre bein hnst", "value" => 0, "emotion_id" => $neutral],
            ["style_id" => $abbreviation, "text" => "how do u not rmember", "value" => 0, "emotion_id" => $neutral],
            ["style_id" => $abbreviation, "text" => "ye for sure", "value" => 0, "emotion_id" => $neutral],
            ["style_id" => $abbreviation, "text" => "if u havent left yet, will u brng me a sweatshirt", "value" => 0, "emotion_id" => $neutral],
            ["style_id" => $abbreviation, "text" => "wat r u doin anyway", "value" => 0, "emotion_id" => $neutral],
            ["style_id" => $abbreviation, "text" => "r u okay", "value" => 0, "emotion_id" => $neutral],
            ["style_id" => $abbreviation, "text" => "we can just do it nxt wknd", "value" => 0, "emotion_id" => $neutral],
            ["style_id" => $abbreviation, "text" => "wat email addr shud I use", "value" => 0, "emotion_id" => $neutral],

            // Grammatical
            ["style_id" => $grammatical, "text" => "How come you didn't respond to me?", "value" => 0, "emotion_id" => $neutral],
            ["style_id" => $grammatical, "text" => "Please don't do that.", "value" => 0, "emotion_id" => $neutral],
            ["style_id" => $grammatical, "text" => "What should I wear today?", "value" => 0, "emotion_id" => $neutral],
            ["style_id" => $grammatical, "text" => "Yeah we will figure it out together.", "value" => 0, "emotion_id" => $neutral],
            ["style_id" => $grammatical, "text" => "This doesn’t even feel real.", "value" => 0, "emotion_id" => $neutral],
            ["style_id" => $grammatical, "text" => "Want to meet for coffee today?", "value" => 0, "emotion_id" => $neutral],
            ["style_id" => $grammatical, "text" => "We will talk about it in person.", "value" => 0, "emotion_id" => $neutral],
            ["style_id" => $grammatical, "text" => "Are you almost here?", "value" => 0, "emotion_id" => $neutral],
            ["style_id" => $grammatical, "text" => "The library is closed on Sundays.", "value" => 0, "emotion_id" => $neutral],
            ["style_id" => $grammatical, "text" => "How'd your first day of school go?", "value" => 0, "emotion_id" => $neutral],
            ["style_id" => $grammatical, "text" => "Can you keep me updated? ", "value" => 0, "emotion_id" => $neutral],

            // Emoji
            ["style_id" => $emoji, "text" => "Did you ask your friends? 🤔", "value" => 0, "emotion_id" => $neutral],
            ["style_id" => $emoji, "text" => "Are you joking? 😕", "value" => 0, "emotion_id" => $neutral],
            ["style_id" => $emoji, "text" => "You always have an answer for everything.	🙄", "value" => 0, "emotion_id" => $neutral],
            ["style_id" => $emoji, "text" => "Do you think they will find out? 🤫", "value" => 0, "emotion_id" => $neutral],
            ["style_id" => $emoji, "text" => "I'll be home soon. 🙄", "value" => 0, "emotion_id" => $neutral],
            ["style_id" => $emoji, "text" => "Are you almost done? 😐", "value" => 0, "emotion_id" => $neutral],
            ["style_id" => $emoji, "text" => "I'm not really sure where this one is. 🤔", "value" => 0, "emotion_id" => $neutral],
            ["style_id" => $emoji, "text" => "Are you picking me up today? 😬", "value" => 0, "emotion_id" => $neutral],
            ["style_id" => $emoji, "text" => "Are they coming tonight? 😏", "value" => 0, "emotion_id" => $neutral],
            ["style_id" => $emoji, "text" => "What time are you guys getting home? 🤔", "value" => 0, "emotion_id" => $neutral],
            ["style_id" => $emoji, "text" => "What are you doing this weekend? 😬", "value" => 0, "emotion_id" => $neutral],

            /**
             * Positive
             */
            // Abbreviated
            ["style_id" => $abbreviation, "text" => "we shud go to the beach", "value" => 0.72, "emotion_id" => $positive],
            ["style_id" => $abbreviation, "text" => "that would be awesme", "value" => 0.73, "emotion_id" => $positive],
            ["style_id" => $abbreviation, "text" => "that sounds like fun did u enjoy it", "value" => 0.75, "emotion_id" => $positive],
            ["style_id" => $abbreviation, "text" => "prbly smetime after lunch if thats cool", "value" => 0.78, "emotion_id" => $positive],
            ["style_id" => $abbreviation, "text" => "i now youll do grt", "value" => 0.81, "emotion_id" => $positive],
            ["style_id" => $abbreviation, "text" => "remind me to tell u bout the fnny dog vid I saw today", "value" => 0.82, "emotion_id" => $positive],
            ["style_id" => $abbreviation, "text" => "thats sych a cute idea", "value" => 0.84, "emotion_id" => $positive],
            ["style_id" => $abbreviation, "text" => "go head and do tht, take ur time. ", "value" => 0.88, "emotion_id" => $positive],
            ["style_id" => $abbreviation, "text" => "good luck w/ the intervw tmr", "value" => 0.92, "emotion_id" => $positive],
            ["style_id" => $abbreviation, "text" => "grats on the new bby", "value" => 0.94, "emotion_id" => $positive],
            ["style_id" => $abbreviation, "text" => "its so grt to finally hear from u", "value" => 0.95, "emotion_id" => $positive],

            // Grammatical
            ["style_id" => $grammatical, "text" => "That was such a great memory!", "value" => 0.66, "emotion_id" => $positive],
            ["style_id" => $grammatical, "text" => "That would be perfect!", "value" => 0.71, "emotion_id" => $positive],
            ["style_id" => $grammatical, "text" => "Sounds like a fun game!", "value" => 0.76, "emotion_id" => $positive],
            ["style_id" => $grammatical, "text" => "I really hope you made it home safe. ", "value" => 0.78, "emotion_id" => $positive],
            ["style_id" => $grammatical, "text" => "It wasn't the best timing but I'm happy for you.", "value" => 0.78, "emotion_id" => $positive],
            ["style_id" => $grammatical, "text" => "I'm pretty sure!", "value" => 0.78, "emotion_id" => $positive],
            ["style_id" => $grammatical, "text" => "The best part is, we get to go for free!", "value" => 0.81, "emotion_id" => $positive],
            ["style_id" => $grammatical, "text" => "Please keep up the good work. ", "value" => 0.81, "emotion_id" => $positive],
            ["style_id" => $grammatical, "text" => "Nevermind I figured it out, thank you!", "value" => 0.85, "emotion_id" => $positive],
            ["style_id" => $grammatical, "text" => "I'm excited to show you this game!", "value" => 0.89, "emotion_id" => $positive],
            ["style_id" => $grammatical, "text" => "Great! Thank you so much!", "value" => 0.92, "emotion_id" => $positive],

            // Emoji
            ["style_id" => $emoji, "text" => "Absolutely, no worries. 😅", "value" => 0.69, "emotion_id" => $positive],
            ["style_id" => $emoji, "text" => "I'm happy its not raining today! 😋", "value" => 0.72, "emotion_id" => $positive],
            ["style_id" => $emoji, "text" => "Sounds good to me! 🙂", "value" => 0.76, "emotion_id" => $positive],
            ["style_id" => $emoji, "text" => "I finally figured it out! 😁", "value" => 0.8, "emotion_id" => $positive],
            ["style_id" => $emoji, "text" => "I'm looking forward to it! 😊", "value" => 0.8, "emotion_id" => $positive],
            ["style_id" => $emoji, "text" => "I'm having fun! 😂", "value" => 0.81, "emotion_id" => $positive],
            ["style_id" => $emoji, "text" => "I'm so excited for this weekend! 😘", "value" => 0.85, "emotion_id" => $positive],
            ["style_id" => $emoji, "text" => "Gotcha! Sounds good! 😋", "value" => 0.85, "emotion_id" => $positive],
            ["style_id" => $emoji, "text" => "I'm excited for you to get home! 🤗", "value" => 0.85, "emotion_id" => $positive],
            ["style_id" => $emoji, "text" => "Have fun tonight! 😜", "value" => 0.88, "emotion_id" => $positive],
            ["style_id" => $emoji, "text" => "Wow, happy birthday! 🤗", "value" => 0.94, "emotion_id" => $positive],
        ];

        foreach ($a as $array) {
            Sentence::create($array);
        }
    }
}
