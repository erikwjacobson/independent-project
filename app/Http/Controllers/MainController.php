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
        $sentences = Sentence::all();
        $emotions = Emotion::all();
        $sentence = $sentences->random(1)->first();
        return view('main', compact('sentence', 'emotions'));
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
        /**
         * This is the code that was being used to store.
         * Since we are no longer accepting data entries this is just being used as a demo.
         */
        //$record = Record::firstOrCreate([
            //'user_id' => Auth::id(),
            //'sentence_id' => $sentence,
            //'answer' => $request->answer
        //]);

        return redirect()->route('main');
    }
}
