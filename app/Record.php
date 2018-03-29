<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    /**
     * Each record belongs to one user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
