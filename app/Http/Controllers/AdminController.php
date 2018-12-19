<?php

namespace App\Http\Controllers;

use App\Emotion;
use App\Record;
use App\Sentence;
use App\Style;
use App\User;
use App\Exports\DataExport;
use App\Exports\QuestionExport;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{
    /**
     * Administrator dashboard view
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function dashboard()
    {
        $participants = User::orderBy('created_at')->with('records')->get();

        return view('admin.dashboard', compact('participants'));
    }

    /**
     * Exports data
     *
     * @param Request $request
     * @return \Illuminate\Http\Response|\Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function export(Request $request)
    {
        // Grab records and cache them for later use
        $records = Cache::remember('records', 60, function () {
            return Record::with('sentence')->get();
        });
        $allSentences = Cache::remember('sentences', 60, function () {
            return Sentence::all();
        });
        $allStyles = Cache::remember('styles', 60, function() {
            return Style::all();
        });
        $allEmotions = Cache::remember('emotions', 60, function() {
            return Emotion::all();
        });

        // Export based upon type
        switch($request->type) {
            case 'q':
                $filename = 'question_' . Carbon::today()->toDateString(). '.xlsx';
                return (new QuestionExport())->download($filename);
            default:
                $filename = 'category_' . Carbon::today()->toDateString(). '.xlsx';
                return (new DataExport())->download($filename);
        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function sentences()
    {
        $sentences = Sentence::with(['emotion', 'style'])->get();
        return view('admin.sentence', compact('sentences'));
    }

    /**
     * Administrators might need to clear the cache to update the export.
     * Here is where you can do that.
     *
     */
    public function clearCache()
    {
        // Flush Cache
        Cache::flush();

        // Grab records and cache them for later use
        $records = Cache::remember('records', 60, function () {
            return Record::with('sentence')->get();
        });
        $allSentences = Cache::remember('sentences', 60, function () {
            return Sentence::all();
        });
        $allStyles = Cache::remember('styles', 60, function() {
            return Style::all();
        });
        $allEmotions = Cache::remember('emotions', 60, function() {
            return Emotion::all();
        });

        return redirect()->back();
    }
}
