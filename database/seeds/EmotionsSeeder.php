<?php

use App\Emotion;
use Illuminate\Database\Seeder;

class EmotionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $a = [
            ['name' => 'Positive'],
            ['name' => 'Neutral'],
            ['name' => 'Negative'],
        ];

        foreach($a as $array) {
            Emotion::create($array);
        }
    }
}
