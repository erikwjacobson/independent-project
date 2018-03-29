<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sentence extends Model
{
    public function style()
    {
        return $this->hasOne(Style::class);
    }

    public function emotion()
    {
        return $this->hasOne(Emotion::class);
    }
}
