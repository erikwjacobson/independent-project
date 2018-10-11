<?php

namespace App\Http\Controllers;

use App\Emotion;
use App\PracticeQuestion;
use App\Record;
use App\Sentence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{

    /**
     * Practice function
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function practice()
    {
        $user = Auth::user();
        $questions = PracticeQuestion::where('id', '>', $user->practice_questions_completed)->get();
        $end = $questions->count() == 0 ? true : false;
        $emotions = Emotion::all();

        if ($end) {
            return redirect()->route('instructions');
        } else {
            $sentence = $questions->first();
            return view('practice', compact('emotions', 'sentence'));
        }
    }

    /**
     * Ensures practice questions aren't being repeated
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function practiceStore()
    {
        $user = Auth::user();
        $user->practice_questions_completed += 1;
        $user->save();
        return redirect()->route('practice');
    }

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
            return redirect()->route('demographics');
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
        $record = Record::firstOrCreate([
            'user_id' => Auth::id(),
            'sentence_id' => $sentence,
            'answer' => $request->answer
        ]);

        return redirect()->route('main');
    }

    /**
     * Returns the finished view page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function end() {
        return view('end');
    }
}
