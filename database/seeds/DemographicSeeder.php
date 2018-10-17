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
            ['name' => 'Age'],
            ['name' => 'Gender'],
            ['name' => 'Ethnicity'], // TODO ?
            ['name' => 'GPA'], // TODO ?
            ['name' => 'Year in School'], // TODO ?
        ];

        foreach($a as $values) {
            Demographic::create($values);
        }
    }
}
