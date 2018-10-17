<?php

namespace App\Http\Controllers;

use App\Sentence;
use App\User;
use App\Exports\DataExport;
use Illuminate\Http\Request;
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
     * Export the data
     *
     * @return \Illuminate\Http\Response|\Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function export()
    {
        return (new DataExport())->download();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function sentences()
    {
        $sentences = Sentence::with(['emotion', 'style'])->get();
        return view('admin.sentence', compact('sentences'));
    }
}
