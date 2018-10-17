<?php

namespace App\Http\Controllers;

use App\Demographic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    /**
     * Shows the demographics view
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function demographics()
    {
        return view('demographics');
    }

    /**
     * Stores demographic information about the user
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $demographics = Demographic::all();

        foreach($demographics as $demo) {
            $demoName = strtolower($demo->name);

            if(in_array($demoName, $request->keys())) {
                $user->demographics()->attach(
                    $demo,
                    ['value' => $request[$demoName]]
                );
            }
        }

        return redirect()->route('end');
    }
}
