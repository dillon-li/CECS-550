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
      $user = Auth::user();
      if (Auth::user()->role == 'admin')
      {
        $users_all = User::all();

        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $products = \Stripe\Product::all();

        $details = [
          "users_all" => $users_all,
          "products" => $products["data"]
        ];

        if (Auth::user()->stripe_id != null)
        {
          $user = Auth::user();
          \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
          $charges = \Stripe\Charge::all(array("customer" => $user->stripe_id));
          $details["charges"] = $charges;
        }

        return view('home')->with($details);
      }
      else {
        if ($user->stripe_id != null)
        {
          \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
          $charges = \Stripe\Charge::all(array("customer" => $user->stripe_id));
          $details = [
            "user" => $user,
            "charges" => $charges
          ];
          return view('home')->with($details);
        }

        return view('home');
      }
    }
}
