<?php

use App\Demographic;
use Illuminate\Database\Seeder;

class DemographicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $a = [
            ['id' => 1, 'name' => 'age'],
            ['id' => 2, 'name' => 'gender'],
            ['id' => 3, 'name' => 'primary_language'],
            ['id' => 4, 'name' => 'twitter_use'],
            ['id' => 5, 'name' => 'facebook_use'],
            ['id' => 6, 'name' => 'youtube_use'],
            ['id' => 7, 'name' => 'instagram_use'],
        ];

        foreach($a as $values) {
            Demographic::create($values);
        }
    }
}
