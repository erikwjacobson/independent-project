<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * UserController constructor.
     *
     * Extra safeguard for authentication
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * All Users
     *
     * @return User[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        $users = User::all();

        return $users;
    }

    /**
     * Single User
     *
     * @param User $user
     * @return User
     */
    public function show(User $user)
    {
        return $user;
    }
}
