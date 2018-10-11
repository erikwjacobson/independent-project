<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application introduction.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        return view('home');
    }

    /**
     * Show the application instructions
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function instructions()
    {
        return view('instructions');
    }
}
