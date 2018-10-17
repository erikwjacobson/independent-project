<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Demographic extends Model
{
    /**
     * Each demographic has records for multiple users
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_demographic')->withPivot('value')->withTimestamps();
    }
}
