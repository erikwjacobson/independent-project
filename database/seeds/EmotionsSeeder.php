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
            ['id' => 1, 'name' => 'Positive'],
            ['id' => 2, 'name' => 'Neutral'],
            ['id' => 3, 'name' => 'Negative'],
        ];

        foreach($a as $array) {
            Emotion::create($array);
        }
    }
}
