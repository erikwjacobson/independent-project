<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller
{
    /**
     * API register pages
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function apiRegister()
    {
        if(Auth::guest()) {

            return view('api/register');

        } else {

            return redirect()->route('api.info');
        }
    }

    /**
     * API in depth information page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function apiInfo()
    {
        return view('api/info');
    }
}
