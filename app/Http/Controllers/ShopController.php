<?php

namespace CECS550\Http\Controllers;

use Illuminate\Http\Request;
use Cart;

class ShopController extends Controller
{
    public function displayCart()
    {
      \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
      $content = Cart::content();
      foreach ($content as $cartItem)
      {
        $sku = \Stripe\SKU::retrieve($cartItem->id);
        $cartItem->pic = $sku->metadata->img_path;
      }

      $details = [
        "content" => Cart::content(),
        "subtotal" => str_replace(',', '', Cart::subtotal()) / 100
      ];

      return view('account.cart')->with($details);
    }

    public function addToCart($id)
    {
      \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
      $sku = \Stripe\SKU::retrieve($id);
      $product = \Stripe\Product::retrieve($sku->product);

      Cart::add($id, $product->name, 1, $sku->price);

      return redirect()->action('ShopController@displayCart');
    }
}