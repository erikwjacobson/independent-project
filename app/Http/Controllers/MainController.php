<?php

namespace App\Http\Controllers;

use App\Emotion;
use App\Record;
use App\Sentence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
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
