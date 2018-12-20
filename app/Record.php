<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    protected $fillable = ['user_id', 'sentence_id', 'answer'];

    protected $appends = ['correct'];
    /**
     * Each record belongs to one user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Every record is associated with one sentence
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function sentence()
    {
        return $this->hasOne(Sentence::class, 'id', 'sentence_id');
    }

    /**
     * Get correct attribute
     *
     * @return bool
     */
    public function getCorrectAttribute()
    {
        return $this->answer === $this->sentence->emotion_id ? true : false;
    }
}
