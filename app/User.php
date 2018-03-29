<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

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
     * User has many records
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function records()
    {
        return $this->hasMany(Record::class);
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


}
