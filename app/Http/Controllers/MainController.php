<?php

namespace App\Http\Controllers;

use App\Emotion;
use App\Record;
use App\Sentence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    /**
     * The main page that contains the questions as a means of recording the data
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $user = Auth::user();
        $sentences = $user->remainingSentences()->get();
        $end = $sentences->count() == 0 ? true : false;
        $emotions = Emotion::all();

        if($end) {
            return view('end');
        } else {
            $sentence = $sentences->random(1)->first();
            return view('main', compact('sentence', 'emotions'));
        }
    }

    /**
     * Stores the record for the participant's response
     *
     * @param $sentence
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store($sentence, Request $request)
    {
        $record = new Record();

        $record->user_id = Auth::id();
        $record->sentence_id = $sentence;
        $record->answer = $request->answer;

        $record->save();

        return redirect()->route('main');
    }
}