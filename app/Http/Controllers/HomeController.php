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

        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $products = \Stripe\Product::all();

        $details = [
          "users_all" => $users_all,
          "products" => $products["data"]
        ];

        return view('home')->with($details);
      }
      else {
        return view('home');
      }
    }

    // Homepage
    public function welcome()
    {
      \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
      $products = \Stripe\Product::all();

      $details = [
        "products" => $products["data"]
      ];

      return view('welcome')->with($details);
    }
}
