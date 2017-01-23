<?php

namespace CECS550\Http\Controllers;

use Illuminate\Http\Request;
use CECS550\User;
use CECS550\Address;

class AccountController extends Controller
{
  /*
  public function getProfile(Request $request, $username){
    $user = User::Where('username', $username)->first();
    \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    \Stripe\Stripe::setApiVersion("2016-03-07");
    $account = \Stripe\Account::retrieve($user->stripe_id);
    $with = [
      'user' => $user,
      'account' => $account
    ];
    return view('member.profile')->with($with);
  }
  */

  public function index(Request $request)
  {
    $user = User::Where('username', $request->User()->username)->first();
    $shipping = Address::Where('userID', $user->id)->get();
    $details = [
      'user' => $user,
      'shipping' => $shipping,
    ];
    return view('account.index')->with($details);
  }

  public function addAddressPage()
  {
    return view('account.addAddress');
  }

  public function addAddress(Request $request)
  {
    $this->validate($request, [
      'street' => 'required',
      'city' => 'required',
      'zipcode' => 'required'
    ]);

    Address::create(
      [
        'userID' => $request->user()->id,
        'street' => $request->street,
        'city' => $request->city,
        'state' => $request->state,
        'zipcode' => $request->zipcode
      ]);

    return redirect()->action('AccountController@index');
  }
}
