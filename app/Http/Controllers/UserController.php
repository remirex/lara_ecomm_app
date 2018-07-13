<?php

namespace App\Http\Controllers;

use App\Order;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');

    }

    public function getProfile($id)
    {
        $user = User::where('id',$id)->get();

        return view('pages.profile', compact('user','orders','dt'));

    }
}
