<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emotion extends Model
{
    /**
     * There are many sentences that convey each emotion.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sentences()
    {
        return $this->hasMany(Sentence::class);
    }
}
