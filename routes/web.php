<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function() {
  \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
  $products = \Stripe\Product::all();

  $details = [
    "products" => $products["data"]
  ];

  return view('welcome')->with($details);
});

Auth::routes();

Route::get('logout', '\CECS550\Http\Controllers\Auth\LoginController@logout');

Route::get('/home', 'HomeController@index');

Route::group(['prefix' => 'account'], function(){
  Route::get('/', 'AccountController@index');
  Route::get('/address', 'AccountController@addAddressPage');
  Route::post('/address/add', 'AccountController@addAddress');
  Route::get('/address/edit/{address_id}', 'AccountController@editAddressPage');
  Route::post('/address/edit/{address_id}', 'AccountController@editAddress');
  Route::get('/edit', 'AccountController@editPage');
  Route::post('/edit', 'AccountController@edit');
});

Route::group(['prefix' => 'product'], function(){
  Route::get('/create', 'ProductController@createPage');
  Route::post('/create', 'ProductController@create');
  Route::get('/{id}/delete', 'ProductController@delete');
  Route::get('/{id}/edit', 'ProductController@editPage');
  Route::post('{id}/edit', 'ProductController@edit');
  Route::get('/view/{category}', 'ProductController@viewCategory');
  Route::get('/view/category/all', 'ProductController@viewAll');
  Route::get('/{id}', 'ProductController@view');
  Route::get('/addToCart/{id}', 'ShopController@addToCart');
});

Route::group(['prefix' => 'cart'], function(){
  Route::get('/', 'ShopController@displayCart');
  Route::get('/payment', 'ShopController@paymentPage');
  Route::post('/payment', 'ShopController@purchase');
  Route::get('/delete/{rowId}', 'ShopController@removeFromCart');
});
