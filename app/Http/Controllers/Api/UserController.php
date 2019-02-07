<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\User as UserResource;


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
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $users = UserResource::collection(User::all());

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
