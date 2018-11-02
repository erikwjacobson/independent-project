<?php

namespace App\Http\Controllers;

use App\Emotion;
use App\PracticeQuestion;
use App\Record;
use App\Sentence;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class MainController extends Controller
{

    /**
     * Practice function
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function practice()
    {
        $user = User::findOrFail(Auth::id());
        $numberCompleted = $user->practice_questions_completed;
        $questions = PracticeQuestion::where('id', '>', $numberCompleted)->get();

        $end = $questions->count() == 0 ? true : false;
        $emotions = Emotion::all();

        if ($end) {
            return redirect()->route('instructions');
        } else {
            $sentence = $questions->first();
            return view('practice', compact('emotions', 'sentence', 'numberCompleted'));
        }
    }

    /**
     * Ensures practice questions aren't being repeated
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function practiceStore()
    {
        $user = User::findOrFail(Auth::id());
        $user->practice_questions_completed += 1;
        $user->save();
        return redirect()->route('practice');
    }

    /**
     * The main page that contains the questions as a means of recording the data
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $all = Sentence::all();
        $sentences = $user->remainingSentences;
        $end = $sentences->count() == 0 ? true : false;
        $emotions = Emotion::all();

        // If finished
        if($end) {
            return redirect()->route('demographics');
        }
        // Else if half way through and no break has been taken
        elseif($sentences->count() <= ($all->count() / 2) && !$request->session()->get('break')) {
            return redirect()->route('break');
        }
        else {
            $sentence = $sentences->random(1)->first();
            return view('main', compact('sentence', 'emotions'));
        }
    }

    /**
     * Provides a break to the user
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function break(Request $request)
    {
        $request->session()->put('break', true);
        return view('break');
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
     * Stores the record with special refresh value
     *
     * @param $sentence
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function refreshStore($sentence, Request $request)
    {
        $record = Record::firstOrCreate([
            'user_id' => Auth::id(),
            'sentence_id' => $sentence,
            'answer' => 999
        ]);

        return response('Successfully submitted refresh flag.', 200);
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
