<?php

namespace CECS550\Http\Controllers;

use Illuminate\Http\Request;
use CECS550\User;
use CECS550\Address;
use CECS550\Http\Requests\EditAccount;

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
      'name' => 'required',
      'street' => 'required',
      'city' => 'required',
      'zipcode' => 'required'
    ]);

    Address::create(
      [
        'userID' => $request->user()->id,
        'name' => $request->name,
        'street' => $request->street,
        'city' => $request->city,
        'state' => $request->state,
        'zipcode' => $request->zipcode
      ]);

    return redirect()->action('AccountController@index');
  }

  public function editAddressPage($id)
  {
    $address = Address::Where('id', $id)->first();
    $details = [
      'address' => $address
    ];
    return view('account.editAddress')->with($details);
  }

  public function editAddress(Request $request, $id)
  {
    $address = Address::Where('id', $id)->first();
    $address->street = $request->street;
    $address->city = $request->city;
    $address->state = $request->state;
    $address->zipcode = $request->zipcode;
    $address->save();

    return redirect()->action('AccountController@index');
  }

  public function editPage(Request $request)
  {
    $user = User::Where('username', $request->User()->username)->first();
    $details = [
      'user' => $user
    ];
    return view('account.edit')->with($details);
  }

  public function edit(EditAccount $request)
  {
    $user = User::Where('username', $request->User()->username)->first();
    $user->name = $request->name;
    $user->username = $request->username;
    $user->email = $request->email;
    $user->gender = $request->gender;
    $user->save();

    return redirect()->action('AccountController@index');
  }
}
