<?php

namespace App\Http\Controllers;

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
        $participants = User::all();

        return view('admin.dashboard', compact('participants'));
    }


    /**
     * Export the data
     */
    public function export()
    {
        return (new DataExport())->download();

    }
}
