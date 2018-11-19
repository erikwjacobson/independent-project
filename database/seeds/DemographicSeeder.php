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
            ['name' => 'age'],
            ['name' => 'gender'],
            ['name' => 'primary_language'],
            ['name' => 'twitter_use'],
            ['name' => 'facebook_use'],
            ['name' => 'youtube_use'],
            ['name' => 'instagram_use'],
        ];

        foreach($a as $values) {
            Demographic::create($values);
        }
    }
}
