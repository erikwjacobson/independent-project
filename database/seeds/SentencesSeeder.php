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
            ["style_id" => $abbreviation, "text" => "I'm in a terrible mood.", "value" => -0.93, 'emotion_id' => $negative],
            ["style_id" => $abbreviation, "text" => "I'm so sorry something came up and I can't come with.", "value" => -0.89, 'emotion_id' => $negative],
            ["style_id" => $abbreviation, "text" => "I can’t believe I fell asleep in class today.", "value" => -0.87, 'emotion_id' => $negative],
            ["style_id" => $abbreviation, "text" => "Wow, I can't believe you spoiled the movie for us!", "value" => -0.81, 'emotion_id' => $negative],
            ["style_id" => $abbreviation, "text" => "I’ve been waiting for two hours now.", "value" => -0.79, 'emotion_id' => $negative],
            ["style_id" => $abbreviation, "text" => "Ignore her, obviously you didn’t!", "value" => -0.77, 'emotion_id' => $negative],
            ["style_id" => $abbreviation, "text" => "Why was there water all over the floor?", "value" => -0.75, 'emotion_id' => $negative],
            ["style_id" => $abbreviation, "text" => "I'm going to go lay down.", "value" => -0.75, 'emotion_id' => $negative],
            ["style_id" => $abbreviation, "text" => "I really wish you would have told me.", "value" => -0.74, 'emotion_id' => $negative],
            ["style_id" => $abbreviation, "text" => "You’ve changed so much in the last year.", "value" => -0.7, 'emotion_id' => $negative],
            ["style_id" => $abbreviation, "text" => "Why do you still try and talk to me?", "value" => -0.65, 'emotion_id' => $negative],

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
            ["style_id" => $emoji, "text" => "I’m so sorry for your loss.", "value" => -0.92, 'emotion_id' => $negative],
            ["style_id" => $emoji, "text" => "My dog went missing.", "value" => -0.89, 'emotion_id' => $negative],
            ["style_id" => $emoji, "text" => "I'm scared she's going to do something tonight.", "value" => -0.88, 'emotion_id' => $negative],
            ["style_id" => $emoji, "text" => "That really doesn't make sense to me.", "value" => -0.84, 'emotion_id' => $negative],
            ["style_id" => $emoji, "text" => "I didn't want to go.", "value" => -0.82, 'emotion_id' => $negative],
            ["style_id" => $emoji, "text" => "I'm not sure if I'm going to go.", "value" => -0.78, 'emotion_id' => $negative],
            ["style_id" => $emoji, "text" => "So I just kicked my roommate out.", "value" => -0.77, 'emotion_id' => $negative],
            ["style_id" => $emoji, "text" => "Why does this always happen to me?", "value" => -0.75, 'emotion_id' => $negative],
            ["style_id" => $emoji, "text" => "You shouldn't go alone.", "value" => -0.69, 'emotion_id' => $negative],
            ["style_id" => $emoji, "text" => "You really need to talk to her about last night.", "value" => -0.66, 'emotion_id' => $negative],
            ["style_id" => $emoji, "text" => "I can’t wait until this week is over.", "value" => -0.65, 'emotion_id' => $negative],

            /**
             * Neutral
             */
            // abbreviation

            ["style_id" => $abbreviation, "text" => "Did you really think I wouldn't find out?", "value" => 0, "emotion_id" => $neutral],
            ["style_id" => $abbreviation, "text" => "Hey, I really meant what I said earlier.", "value" => 0, "emotion_id" => $neutral],
            ["style_id" => $abbreviation, "text" => "I'm not in the mood for this right now.", "value" => 0, "emotion_id" => $neutral],
            ["style_id" => $abbreviation, "text" => "At least you’re being honest.", "value" => 0, "emotion_id" => $neutral],
            ["style_id" => $abbreviation, "text" => "How do you not remember?", "value" => 0, "emotion_id" => $neutral],
            ["style_id" => $abbreviation, "text" => "Yeah, for sure.", "value" => 0, "emotion_id" => $neutral],
            ["style_id" => $abbreviation, "text" => "If you haven't left yet, will you bring me a sweatshirt?", "value" => 0, "emotion_id" => $neutral],
            ["style_id" => $abbreviation, "text" => "What are you doing anyways?", "value" => 0, "emotion_id" => $neutral],
            ["style_id" => $abbreviation, "text" => "Are you okay?", "value" => 0, "emotion_id" => $neutral],
            ["style_id" => $abbreviation, "text" => "We can just do it next weekend.", "value" => 0, "emotion_id" => $neutral],
            ["style_id" => $abbreviation, "text" => "What email address should I use?", "value" => 0, "emotion_id" => $neutral],

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
            ["style_id" => $grammatical, "text" => "Did you ask your friends?", "value" => 0, "emotion_id" => $neutral],
            ["style_id" => $grammatical, "text" => "How'd your first day of school go?", "value" => 0, "emotion_id" => $neutral],

            // Emoji
            ["style_id" => $emoji, "text" => "Are you joking?", "value" => 0, "emotion_id" => $neutral],
            ["style_id" => $emoji, "text" => "You always have an answer for everything.	", "value" => 0, "emotion_id" => $neutral],
            ["style_id" => $emoji, "text" => "Do you think they will find out?", "value" => 0, "emotion_id" => $neutral],
            ["style_id" => $emoji, "text" => "Can you keep me updated?	", "value" => 0, "emotion_id" => $neutral],
            ["style_id" => $emoji, "text" => "I'll be home soon.", "value" => 0, "emotion_id" => $neutral],
            ["style_id" => $emoji, "text" => "Are you almost done?", "value" => 0, "emotion_id" => $neutral],
            ["style_id" => $emoji, "text" => "I'm not really sure where this one is.", "value" => 0, "emotion_id" => $neutral],
            ["style_id" => $emoji, "text" => "Are you picking me up today?", "value" => 0, "emotion_id" => $neutral],
            ["style_id" => $emoji, "text" => "Are they coming tonight?", "value" => 0, "emotion_id" => $neutral],
            ["style_id" => $emoji, "text" => "What time are you guys getting home?", "value" => 0, "emotion_id" => $neutral],
            ["style_id" => $emoji, "text" => "What are you doing this weekend?", "value" => 0, "emotion_id" => $neutral],

            /**
             * Positive
             */
            // Abbreviated
            ["style_id" => $abbreviation, "text" => "We should go to the beach.", "value" => 0.72, "emotion_id" => $positive],
            ["style_id" => $abbreviation, "text" => "That would be awesome!", "value" => 0.73, "emotion_id" => $positive],
            ["style_id" => $abbreviation, "text" => "That sounds like fun! Did you enjoy it?", "value" => 0.75, "emotion_id" => $positive],
            ["style_id" => $abbreviation, "text" => "Probably sometime after lunch, if that's cool.", "value" => 0.78, "emotion_id" => $positive],
            ["style_id" => $abbreviation, "text" => "I know you'll do great!", "value" => 0.81, "emotion_id" => $positive],
            ["style_id" => $abbreviation, "text" => "Remind me to tell you about the funny dog video I saw today.", "value" => 0.82, "emotion_id" => $positive],
            ["style_id" => $abbreviation, "text" => "That's such a cute idea!", "value" => 0.84, "emotion_id" => $positive],
            ["style_id" => $abbreviation, "text" => "Go ahead and do that, take your time. ", "value" => 0.88, "emotion_id" => $positive],
            ["style_id" => $abbreviation, "text" => "Good luck with the interview tomorrow.", "value" => 0.92, "emotion_id" => $positive],
            ["style_id" => $abbreviation, "text" => "Congratulations on the new baby!", "value" => 0.94, "emotion_id" => $positive],
            ["style_id" => $abbreviation, "text" => "It's so great to finally hear from you!", "value" => 0.95, "emotion_id" => $positive],

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
            ["style_id" => $emoji, "text" => "Absolutely, no worries.", "value" => 0.69, "emotion_id" => $positive],
            ["style_id" => $emoji, "text" => "I'm happy its not raining today!", "value" => 0.72, "emotion_id" => $positive],
            ["style_id" => $emoji, "text" => "Sounds good to me!", "value" => 0.76, "emotion_id" => $positive],
            ["style_id" => $emoji, "text" => "I finally figured it out!", "value" => 0.8, "emotion_id" => $positive],
            ["style_id" => $emoji, "text" => "I'm looking forward to it!", "value" => 0.8, "emotion_id" => $positive],
            ["style_id" => $emoji, "text" => "I'm having fun!", "value" => 0.81, "emotion_id" => $positive],
            ["style_id" => $emoji, "text" => "I'm so excited for this weekend!", "value" => 0.85, "emotion_id" => $positive],
            ["style_id" => $emoji, "text" => "Gotcha! Sounds good!", "value" => 0.85, "emotion_id" => $positive],
            ["style_id" => $emoji, "text" => "I'm excited for you to get home!", "value" => 0.85, "emotion_id" => $positive],
            ["style_id" => $emoji, "text" => "Have fun tonight!", "value" => 0.88, "emotion_id" => $positive],
            ["style_id" => $emoji, "text" => "Wow, happy birthday!", "value" => 0.94, "emotion_id" => $positive],
        ];

        foreach ($a as $array) {
            Sentence::create($array);
        }
    }
}
