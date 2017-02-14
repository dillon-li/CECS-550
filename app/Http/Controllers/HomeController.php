<?php

namespace CECS550\Http\Controllers;

use Illuminate\Http\Request;
use CECS550\User;
use Auth;

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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if (Auth::user()->role == 'admin')
      {
        $users_all = User::all();
        $details['users_all'] = $users_all;
        return view('home')->with($details);
      }
      else {
        return view('home');
      }
    }
}
