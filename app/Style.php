<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Style extends Model
{
    /**
     * There are many sentences with each specific style
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sentences()
    {
        return $this->hasMany(Sentence::class);
    }
}
