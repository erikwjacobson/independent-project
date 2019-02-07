<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $a = [
            'id' => $this->id,
            'username' => $this->username,
            'admin' => $this->admin,
            'practice_questions_completed' => $this->practice_questions_completed,
            'computer' => $this->computer,
            'researcher' => $this->researcher_initials,
            'overtime' => $this->overtime,
            'credit_granted' => $this->credit_granted,
            'progress' => $this->progress,
            'comments' => $this->comments,
            'records' => $this->records()->with('sentence.emotion', 'sentence.style')->get(),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
        foreach($this->demographics()->get() as $demographic) {
            $a[$demographic->name] = $demographic->pivot->value;
        }

        return $a;
    }
}
