<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    // return the welcome user page
    public function index()
    {
        //
        return view('home.index');
    }

    // navigate user to different views based on their usertype
    public function redirect()
    {
        if (!Auth::user()) {
            return view('home.index');
        }
        $usertype = Auth::user()->usertype;

        if ($usertype == 1) {
            return view('admin.home');
        } else
            return view('home.index');
    }
}
