<?php

namespace CECS550\Http\Controllers;

use Illuminate\Http\Request;
use File;
use Product;

class ProductController extends Controller
{
    public function createPage()
    {
      return view('products.create');
    }

    public function create(Request $request)
    {
  /*    $this->validate($request, [
        'name' => 'required',
        'description' => 'required',
        'img' => 'required|max:100000|mimes:jpg,png,gif'
      ]); */

      \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

      $attributes = ["size", "gender", "color"];

      $filename = str_slug($request->name).'.'.$request->file('img')->getClientOriginalExtension();
      $contents = $request->file('img');
      $contents->move(base_path().'/public/images/products', $filename);
      $filepath = '/images/products/'.$filename;
      // Create Product
      $product = \Stripe\Product::create(array(
        "name" => $request->name,
        "description" => $request->description,
        "attributes" => $attributes,
        "metadata" => [
          "img_path" => $filepath
          ]
      ));
      return redirect()->action('HomeController@index');
    }

    public function delete($id)
    {
      \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

      $product = \Stripe\Product::retrieve($id);
      $product->delete();

      return redirect()->action('HomeController@index');
    }

    public function editPage($id)
    {
      \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

      $product = \Stripe\Product::retrieve($id);
      $details = [
        "product" => $product
      ];
      return view('products.edit')->with($details);
    }

    public function edit($id, Request $request)
    {
      \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

      $product = \Stripe\Product::retrieve($request->id);
      $product["name"] = $request->name;
      $product["caption"] = $request->description;

      if ($request->hasFile('img'))
      {
        $filename = str_slug($request->name).'.'.$request->file('img')->getClientOriginalExtension();
        $contents = $request->file('img');
        $path = base_path().'/public/images/products';
        $filepath = '/images/products/'.$filename;
        if(file_exists($filepath))
        {
          File::delete($filepath);
        }
        $contents->move($path, $filename);
        $product->metadata->img_path = $filepath; 
      }

      $product->save();

      return redirect()->action('HomeController@index');
    }

}
