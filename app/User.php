<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Cache;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * A user has many demographics
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function demographics()
    {
        return $this->belongsToMany(Demographic::class, 'user_demographic')->withPivot('value')->withTimestamps();
    }

    /**
     * User has many records
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function records()
    {
        return $this->hasMany(Record::class, 'user_id', 'id');
    }

    /**
     * Remaining sentences that the user has to complete
     * @return mixed
     */
    public function remainingSentences()
    {
        $userRecords = $this->records()->get()->pluck('sentence_id');
        return $remainingSentences = Sentence::whereNotIn('id', $userRecords)->orderBy('id');
    }

    /**
     * Remaining sentences attribute
     * @return mixed
     */
    public function getRemainingSentencesAttribute()
    {
        return $this->remainingSentences()->get();
    }

    /**
     * Get the user's score
     *
     * @return float|int
     */
    public function getScoreAttribute()
    {
        return $this->computeScore();
    }

    /**
     * Compute the score for the given style and emotion
     *
     * @param string $style
     * @param string $emotion
     * @return float|int
     */
    public function computeScore($style, $emotion)
    {
        // Grab records and cache them for later use
        $sentences = Sentence::where('style_id', $style->id)->where('emotion_id', $emotion->id)->pluck('id');

        // Get records with specified sentences
        $recordsBySentence = $this->records()->whereIn('sentence_id', $sentences)->get();

        // Get correct records (where answer is equal to the sentence's emotion id)
        $correct = $recordsBySentence->filter(function($record) {
            return $record->answer == $record->sentence->emotion_id;
        })->count();

        // Find total of user records
        $total = $recordsBySentence->count();

        return $total > 0 ? ($correct / $total) : 0;
    }

    /**
     * Get the user's status of completion
     *
     * @return bool
     */
    public function getCompleteAttribute()
    {
        return $this->remaining_sentences->count() > 0 ? false : true;
    }

    /**
     * Return the percentage progress
     *
     * @return float|int
     */
    public function getProgressAttribute()
    {
        $sentenceTotal = Sentence::all()->count();
        $complete = $sentenceTotal - $this->remaining_sentences->count();
        return ($complete / $sentenceTotal) * 100;
    }
}
