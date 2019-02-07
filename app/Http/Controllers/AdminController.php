<?php

namespace App\Http\Controllers;

use App\Emotion;
use App\Exports\SentenceExport;
use App\Exports\UserExport;
use App\Record;
use App\Sentence;
use App\Style;
use App\User;
use App\Exports\CategoryExport;
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
        $participants = User::where('admin', false)->orderBy('created_at')->with('records')->get();

        return view('admin.dashboard', compact('participants'));
    }

    /**
     * Returns the Export Page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function apiInfo()
    {
        return view('admin.api');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeUserData(Request $request)
    {
        foreach($request->id as $id) {
            $user = User::findOrFail($id);
            $user->computer = $request->computer[$id];
            $user->researcher_initials = $request->researcher_initials[$id];
            $user->overtime = $request->overtime[$id];
            $user->credit_granted = $request->credit_granted[$id];
            $user->comments = $request->comments[$id];

            $user->save();
        }

        return redirect()->back();
    }

    /**
     * Export user information
     *
     * @param Request $request
     * @return \Illuminate\Http\Response|\Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function exportUsers(Request $request)
    {
        $filename = 'users_' . Carbon::today()->toDateString() . '.xlsx';
        return (new UserExport())->download($filename);
    }

    /**
     * Export sentence information
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function exportSentences(Request $request)
    {
        $filename = 'sentence_' . Carbon::today()->toDateString(). '.xlsx';
        $sentences = Cache::remember('sentences', 60, function() {
            // TODO Make Laravel resource for this.
            return $sens = Sentence::with(['emotion', 'style', 'records'])->get();
        });
        return (new SentenceExport($sentences))->download($filename);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function sentences()
    {
        $sentences = Sentence::with(['emotion', 'style', 'records'])->get();
        return view('admin.sentence', compact('sentences'));
    }

    /**
     * Administrators might need to clear the cache to update the export.
     * Here is where you can do that.
     *
     */
    public function buildExports()
    {
        (new SentenceExport())->queue('sentence_' . Carbon::today()->toDateString(). '.xlsx');
        (new QuestionExport())->queue('question_' . Carbon::today()->toDateString(). '.xlsx');

        return redirect()->back();
    }
}
