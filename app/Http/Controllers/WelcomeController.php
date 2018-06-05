<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * Welcome page at route '/'
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function welcome()
    {
        return view('welcome');
    }

    /**
     * Downloads the file at the specified path.
     *
     * Options:
     * - Download the essay
     * - Download the presentation file
     *
     * @param $file
     * @return mixed
     */
    public function download($file)
    {
        return response()->download('files/' . $file);
    }
}
