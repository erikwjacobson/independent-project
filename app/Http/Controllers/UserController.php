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
        if(Auth::user()->demographics()->count() === 0) {
            return view('demographics');
        } else {
            return redirect()->back();
        }
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

        $user->demographics()->attach(
            $demographics->where('name', 'age')->first(),
            ['value' => strtolower($request->age)]
        );
        $user->demographics()->attach(
            $demographics->where('name', 'gender')->first(),
            ['value' => strtolower($request->gender)]
        );

        $demo = $demographics->where('name', 'primary_language')->first();
        $user->demographics()->attach($demo, ['value' => strtolower($request['language'])]);

        if(!empty($request->social)) {
            foreach($request->social as $index => $social) {
                $demoStr = $index . '_use';
                $demo = $demographics->where('name', $demoStr)->first();
                if($social === "on") {
                    $user->demographics()->attach($demo, ['value' => $request[$demoStr]]);
                }
            }
        }
        return redirect()->route('end');
    }
}
